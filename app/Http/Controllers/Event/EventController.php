<?php

namespace App\Http\Controllers\Event;

use Image, Session;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Posts;
use App\Models\Friendships;
use App\Models\Invite;
use App\Models\Notification;
use App\Models\Share;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    //

    // event view
    public function allevents()
    {
        $page_data['events'] = Event::where('privacy', 'public')->whereNull('group_id')->orderBy('id', 'DESC')->limit(20)->get();
        $page_data['view_path'] = 'frontend.events.events';
        return view('frontend.index', $page_data);
    }

    // user event

    public function userevent()
    {
        $page_data['events'] = Event::where('user_id', Auth::user()->id)->whereNull('group_id')->orderBy('id', 'DESC')->get();
        $page_data['view_path'] = 'frontend.events.user_event';
        return view('frontend.index', $page_data);
    }


    // event store
    public function store(Request $request)
    {
        // return $request->all();

        $rules = array(
            'coverphoto' => 'mimes:jpeg,jpg,png,gif|nullable',
            'eventname' => 'required|max:255',
            'eventdate' => 'required',
            'eventtime' => 'required',
            'eventlocation' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }
        if ($request->coverphoto && !empty($request->coverphoto)) {

            //Upload image
            $file_name = rand(1, 35000) . '.' . $request->coverphoto->getClientOriginalExtension();

            //thumbnail
            $img = Image::make($request->coverphoto);
            $img->resize(325, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(uploadTo('event/thumbnail') . $file_name);

            // cover photo 
            $img = Image::make($request->coverphoto);
            $img->resize(1120, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(uploadTo('event/coverphoto') . $file_name);
        }
        $event = new Event();

        $event->user_id = Auth::user()->id;
        $event->title = $request->eventname;
        $event->description = $request->description;
        $event->event_date = $request->eventdate;
        $event->event_time = $request->eventtime;
        $event->location = $request->eventlocation;
        if (isset($request->group_id)) {
            $event->group_id = $request->group_id;
        }
        !empty($request->coverphoto) ? $event->banner =  $file_name : "";
        $event->going_users_id = "[]";
        $event->interested_users_id = "[]";
        $event->privacy = $request->privacy;
        $done = $event->save();
        if ($done) {
            $data['user_id'] = auth()->user()->id;
            $data['privacy'] = $request->privacy;
            $data['publisher'] = 'event';
            $data['publisher_id'] = $event->id;
            $data['post_type'] = "event";
            $data['status'] = 'active';
            $data['description'] = $request->description;
            $data['user_reacts'] = json_encode(array());
            $data['user_reacts'] = json_encode(array());
            $data['tagged_user_ids'] = json_encode(array());
            $data['created_at'] = time();
            $data['updated_at'] = $data['created_at'];
            Posts::create($data);
            Session::flash('success_message', get_phrase('Event Created Successfully'));
            return json_encode(array('reload' => 1));
        }
    }

    //  update event 
    public function update(Request $request, $id)
    {
        $rules = array(
            'coverphoto' => 'mimes:jpeg,jpg,png,gif|nullable',
            'eventname' => 'required|max:255',
            'eventdate' => 'required',
            'eventtime' => 'required',
            'eventlocation' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }
        if ($request->coverphoto && !empty($request->coverphoto)) {

            //Upload image
            $file_name = rand(1, 35000) . '.' . $request->coverphoto->getClientOriginalExtension();

            //thumbnail
            $img = Image::make($request->coverphoto);
            $img->resize(325, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(uploadTo('event/thumbnail') . $file_name);

            // cover photo 
            $img = Image::make($request->coverphoto);
            $img->resize(1120, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(uploadTo('event/coverphoto') . $file_name);
        }
        $event = Event::find($id);

        $event->user_id = Auth::user()->id;
        // store image name for delete file operation 
        $imagename = $event->banner;

        $event->title = $request->eventname;
        $event->description = $request->description;
        $event->event_date = $request->eventdate;
        $event->event_time = $request->eventtime;
        $event->location = $request->eventlocation;
        !empty($request->coverphoto) ? $event->banner =  $file_name : $event->banner;
        $event->privacy = $request->privacy;
        $done = $event->save();
        if ($done) {
            // just put the file name and folder name nothing more :) 
            removeFile('event', $imagename);
            Session::flash('success_message', get_phrase('Event Updated Successfully'));
            return json_encode(array('reload' => 1));
        }
    }

    // delete event 

    public function event_delete()
    {
        $response = array();
        $event = Event::find($_GET['event_id']);
        // store image name for delete file operation 
        $imagename = $event->banner;

        $done = $event->delete();
        if ($done) {
            $response = array('alertMessage' => get_phrase('Event Deleted Successfully'), 'fadeOutElem' => "#event-" . $_GET['event_id']);
            // just put the file name and folder name nothing more :) 
            removeFile('event', $imagename);
        }
        return json_encode($response);
    }



    // single event view 

    public function single_event($id)
    {

        // calculation of popular event 
        $events = Event::where('privacy', 'public')->orderBy('id', 'DESC')->where('user_id', '!=', auth()->user()->id)->where('id', '!=', $id)->limit('500')->get();
        $popularrate = [];
        foreach ($events as $event) {
            $goingusercount  = count(json_decode($event->going_users_id));
            $interestedusercount = count(json_decode($event->interested_users_id));
            $total = $goingusercount + $interestedusercount;
            array_push($popularrate, ['id' => $event->id, 'popular' => $total, 'banner' => $event->banner, 'event_date' => $event->event_date, 'title' => $event->title, 'post_user' => $event->getUser->name, 'user_id' => $event->getUser->id, 'photo' => $event->getUser->photo, 'interested_users_id' => $event->interested_users_id]);
        }
        // custom function for desending order 
        aasort($popularrate, "popular");

        // friend find 
        $friends = Friendships::where('requester', auth()->user()->id)->orWhere('accepter', auth()->user()->id)->where('is_accepted', '1')->orderBy('id', 'DESC')->get();
        $invited_friend_going = Invite::where('event_id', $id)->where('is_accepted', "1")->count();

        

        // for sending  user invite 
        $users = User::orderBy('id', 'DESC')->limit('10')->get();

        $posts =  Posts::where(function ($query) {
            $query->where('posts.privacy', '!=', 'private')
                ->orWhere('posts.user_id', auth()->user()->id);
        })
            ->where('publisher_id', $id)->where('publisher', 'event')
            ->where('posts.status', 'active')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name', 'users.photo', 'users.friends', 'posts.created_at as created_at')
            ->orderBy('posts.post_id', 'DESC')->get();

        $page_data['users'] = $users;
        $page_data['posts'] = $posts;
        $page_data['invited_friend_going'] = $invited_friend_going;
        $page_data['friends'] = $friends;
        $page_data['popularevents'] = $popularrate;
        $page_data['event'] = Event::find($id);
        $page_data['event_going'] = Event::find($id);
        $page_data['view_path'] = 'frontend.events.single_event';
        return view('frontend.index', $page_data);
    }



    // event going 

    public function event_going($id)
    {
        $response = array();


        $going_user_id = auth()->user()->id;
        $event_id = $id;
        $event = Event::find($event_id);
        $event_going_user = json_decode($event->going_users_id);
        array_push($event_going_user, $going_user_id);
        $event_going_user = json_encode($event_going_user);

        $event->going_users_id = $event_going_user;
        $event->save();
        $response = array('alertMessage' => get_phrase('Going to Event'), 'showElem' => "#notGoingId$event_id", 'hideElem' => "#goingId$event_id");
        return json_encode($response);
    }

    // event notgoing 

    public function event_notgoing($id)
    {
        $response = array();

        $going_user_id = auth()->user()->id;
        $event_id = $id;
        $event = Event::find($event_id);
        $event_going_user = json_decode($event->going_users_id, true);
        $this_user_key = array_search(auth()->user()->id, $event_going_user);
        array_splice($event_going_user, $this_user_key);
        $event_going_user = json_encode($event_going_user);

        $event->going_users_id = $event_going_user;
        $event->save();
        $response = array('alertMessage' => get_phrase('Cancle to Event Going'), 'showElem' => "#goingId$event_id", 'hideElem' => "#notGoingId$event_id");
        return json_encode($response);
    }








    // event interested

    public function event_interested($id)
    {
        $response = array();


        $going_user_id = auth()->user()->id;
        $event_id = $id;
        $event = Event::find($event_id);
        $event_going_user = json_decode($event->interested_users_id);
        array_push($event_going_user, $going_user_id);
        $event_going_user = json_encode($event_going_user);

        $event->interested_users_id = $event_going_user;
        $event->save();
        $response = array('alertMessage' => get_phrase('Interested to Event'), 'showElem' => "#notInterestedId$event_id", 'hideElem' => "#interestedId$event_id");
        return json_encode($response);
    }


    // event notinterested

    public function event_notinterested($id)
    {
        $response = array();

        $going_user_id = auth()->user()->id;
        $event_id = $id;
        $event = Event::find($event_id);
        $event_going_user = json_decode($event->interested_users_id, true);
        $this_user_key = array_search(auth()->user()->id, $event_going_user);
        array_splice($event_going_user, $this_user_key);
        $event_going_user = json_encode($event_going_user);

        $event->interested_users_id = $event_going_user;
        $event->save();
        $response = array('alertMessage' => get_phrase('Not Interested to Event'), 'showElem' => "#interestedId$event_id", 'hideElem' => "#notInterestedId$event_id");
        return json_encode($response);
    }


    // invite to friend 
    public function event_invite($invited_friend_id, $requester_id, $event_id)
    {

        $invite = new Invite();
        $invite->invite_reciver_id = $invited_friend_id;
        $invite->invite_sender_id = $requester_id;
        $invite->event_id = $event_id;
        $done = $invite->save();
        if ($done) {
            $notify = new Notification();
            $notify->sender_user_id = auth()->user()->id;
            $notify->reciver_user_id = $invited_friend_id;
            $notify->type = 'event';
            $notify->event_id = $event_id;
            $notify->save();

            Session::flash('success_message', get_phrase('Invite Done'));
            return json_encode(array('reload' => 1));
        }
    }



    // load event on scroll 

    public function load_event_by_scrolling(Request $request)
    {

        $events =  Event::where('privacy', 'public')->whereNull('group_id')->skip($request->offset)->take(20)->orderBy('id', 'DESC')->get();

        $page_data['events'] = $events;
        return view('frontend.events.event-single', $page_data);
    }

    //    share event 
    public function shareevent()
    {
        $id =  $_GET['event_id'];
        $url =  url('/') . '/event/' . $id;

        $response = array();
        $sahre = new Share();
        $sahre->share_user_id = auth()->user()->id;
        $sahre->event_id = $id;
        $sahre->url = $url;
        $done = $sahre->save();
        if ($done) {
            $response = array('alertMessage' => get_phrase('Event Shared Successfully'));
        }
        return json_encode($response);
    }


    function search_user_for_event_inviting(Request $request)
    {
        $event_id = $request->id;

        $users =  User::where('name', 'like', '%' . $request->search_value . '%')
            ->take(30)->get();
        

        $data['users'] = $users;
        return view('frontend.events.invite', $data);
    }


    public function sent_invition(Request $request)
    {
     
        $invited_event_users_id = $request->invited_event_users_id;
        $count = count($invited_event_users_id);

        for ($i = 0; $i < $count; $i++) {
            $invite = new Invite();
            $invite->invite_sender_id = auth()->user()->id;
            $invite->invite_reciver_id = $invited_event_users_id[$i];
            $invite->is_accepted = '0';
            $invite->event_id = $request->event_id;
            $invite->save();

            $notify = new Notification();
            $notify->sender_user_id = auth()->user()->id;
            $notify->reciver_user_id = $invited_event_users_id[$i];
            $notify->type = 'event';
            $notify->event_id = $request->event_id;
            $notify->save();
        }
        Session::flash('success_message', get_phrase('Event Invited Done Successfully'));
        return json_encode(array('reload' => 1));
    }
}
