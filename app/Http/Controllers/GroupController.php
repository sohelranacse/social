<?php

namespace App\Http\Controllers;

use App\Models\Album_image;
use App\Models\Group;
use App\Models\Group_member;
use App\Models\Friendships;
use App\Models\Media_files;
use App\Models\Posts;
use App\Models\Albums;
use App\Models\Event;
use App\Models\Invite;
use App\Models\Notification;
use App\Models\User;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Image,Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DB;

class GroupController extends Controller
{
    public function groups(){
        $page_data['groups'] = Group::orderBy('id','DESC')->where('privacy','public')->where('status','1')->limit('18')->get();
        $page_data['managegroups'] = Group::orderBy('id','DESC')->where('user_id',auth()->user()->id)->limit('6')->get();
        $page_data['joinedgroups'] = Group_member::where('user_id',auth()->user()->id)->where('is_accepted','1')->limit('6')->get();
        $page_data['view_path'] = 'frontend.groups.groups';
        return view('frontend.index', $page_data);
    }


    public function single_group($id){
        $page_data['group'] = Group::find($id);
        $posts =  Posts::where('posts.privacy', '!=', 'private')
                        ->where('posts.publisher', 'group')
                        ->where('posts.publisher_id', $id)
                        ->where('posts.status', 'active')
                        ->join('users', 'posts.user_id', '=', 'users.id')
                        ->select('posts.*', 'users.name', 'users.photo', 'users.friends', 'posts.created_at as created_at')
                        ->orderBy('posts.post_id', 'DESC')->get();
        $totalmember = Group_member::where('group_id',$id)->where('is_accepted','1')->count();
        $page_data['membercount'] = $totalmember;
        $page_data['posts'] = $posts;
        $page_data['view_path'] = 'frontend.groups.discuss';
        return view('frontend.index', $page_data);
    }


    public function store(Request $request){
        $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif|nullable',
            'name' => 'required|max:255',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }
        
        if ($request->image && !empty($request->image)) {
            $file_name = FileUploader::upload($request->image, 'public/storage/groups/logo', 300);
        }

        $group = new Group();
        $group->user_id = auth()->user()->id;
        $group->title = $request->name;
        $group->subtitle = $request->subtitle;
        $group->about = $request->about;
        $group->privacy = $request->privacy;
        $group->status = $request->status;
        if($request->image && !empty($request->image)){
            $group->logo = $file_name;
        }
        $done = $group->save();
        if($done){
            $group_member = new Group_member();
            $group_member->group_id = $group->id;
            $group_member->user_id = auth()->user()->id;
            $group_member->role = 'admin';
            $group_member->is_accepted = '1';
            $done = $group_member->save();
            if($done){
                Session::flash('success_message', get_phrase('Group Created Successfully'));
                return json_encode(array('reload' => 1));
            }
        }
    }





    public function update(Request $request,$id){
        $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif|nullable',
            'name' => 'required|max:255',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }

        $group = Group::find($id);
        //previous image name
        $imagename = $group->logo;
        if ($request->image && !empty($request->image)) {
            $file_name = FileUploader::upload($request->image, 'public/storage/groups/logo', 300);
        }

        
        // $group->user_id = auth()->user()->id;
        $group->title = $request->name;
        $group->subtitle = $request->subtitle;
        $group->about = $request->about;
        $group->privacy = $request->privacy;
        $group->status = $request->status;
        $group->location = $request->location;
        $group->group_type = $request->group_type;
        if($request->image && !empty($request->image)){
            $group->logo = $file_name;
        }
        $done = $group->save();
        if($done){
            // just put the file name and folder name nothing more :) 
            if(!empty($request->image)){
                if (File::exists(public_path('storage/groups/logo/'.$imagename))) {
                    File::delete(public_path('storage/groups/logo/'.$imagename));
                }
            }
        }
        Session::flash('success_message', get_phrase('Group Updated Successfully'));
        return json_encode(array('reload' => 1));
    }


    public function updatecoverphoto(Request $request,$id){
        $group = Group::find($id);
        $imagename = $group->coverphoto;

        if ($request->cover_photo && !empty($request->cover_photo)) {
            //Upload image
            $file_name = rand(1, 35000) . '.' . $request->cover_photo->getClientOriginalExtension();
            //logo
            $img = Image::make($request->cover_photo);
            $img->resize(1120, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(uploadTo('groups/coverphoto') . $file_name);
            $group->banner = $file_name;
        }
        $done = $group->save();
        if($done){
            // just put the file name and folder name nothing more :) 
            if(!empty($request->cover_photo)){
                if (File::exists(public_path('storage/groups/coverphoto/'.$imagename))) {
                    File::delete(public_path('storage/groups/coverphoto/'.$imagename));
                }
            }
        }
        Session::flash('success_message', get_phrase('Cover Photo Updated Successfully'));
        return json_encode(array('reload' => 1));
    }



    public function join($id){
        $response = array();
        $group_member = new Group_member();
        $group_member->group_id = $id;
        $group_member->user_id = auth()->user()->id;
        $group_member->role = 'general';
        $group_member->is_accepted = '1';
        $group_member->save();
        Session::flash('success_message', get_phrase('Group Joind  Successfully'));
        $response = array('reload' => 1);
        return json_encode($response);
    }

    public function rjoin($id){
        $response = array();
        $group_member = Group_member::where('group_id',$id)->delete();
        Session::flash('success_message', get_phrase('Group Joining Canceled'));
        $response = array('reload' => 1);
        return json_encode($response);
    }



    public function peopelinfo($id){
        $page_data['friends'] = Friendships::where('requester', auth()->user()->id)->orWhere('accepter', auth()->user()->id)->where('is_accepted', '1')->orderBy('id', 'DESC')->limit('20')->get();
        $page_data['friends_count'] = Friendships::where('requester', auth()->user()->id)->orWhere('accepter', auth()->user()->id)->where('is_accepted', '1')->orderBy('id', 'DESC')->count();
        $page_data['users'] = User::whereJsonDoesntContain('friends',auth()->user()->id)->get();
        $page_data['group'] = Group::find($id);
        $page_data['total_member'] = Group_member::where('is_accepted','1')->where('group_id',$id)->count();
        $page_data['recent_team_member'] = Group_member::where('is_accepted','1')->where('group_id',$id)->orderBY('id','DESC')->limit('5')->get();
        $page_data['view_path'] = 'frontend.groups.people';
        return view('frontend.index', $page_data);
    }

    public function group_photos($id){
        $page_data['group'] = Group::find($id);
        $page_data['all_photos'] = Media_files::where('group_id', $id)->where('file_type', 'image')->orderBy('id', 'DESC')->get();
        $page_data['all_videos'] = Media_files::where('group_id', $id)->where('file_type', 'video')->orderBy('id', 'DESC')->get();
        $page_data['all_albums'] = Albums::where('group_id', $id)->orderBy('id', 'DESC')->get();
        $page_data['view_path'] = 'frontend.groups.photos';
        return view('frontend.index', $page_data);
    }

    public function all_people_group($id){
        $page_data['group'] = Group::find($id);
        $page_data['all_members'] = Group_member::where('is_accepted','1')->where('group_id',$id)->orderBY('id','DESC')->get();
        $page_data['total_member'] = Group_member::where('is_accepted','1')->where('group_id',$id)->count();
        $page_data['view_path'] = 'frontend.groups.all_people';
        return view('frontend.index', $page_data);
    }


    public function group_event($id){
        $page_data['group'] = Group::find($id);
        $group_events = Event::where('group_id',$id)->where(function($query) {
                    $query->where('privacy', '!=', 'private')
                    ->orWhere('user_id', auth()->user()->id);
                })->get();
        $page_data['group_events'] = $group_events;
        $page_data['view_path'] = 'frontend.groups.event';
        return view('frontend.index', $page_data);
    }



    public function add_album_image(Request $request){
       
        $response = array();
        if(is_array($request->images) && $request->images[0] != null){
            //Data validation
            $rules = array('multiple_files' => 'mimes:jpeg,jpg,png,gif');
            $validator = Validator::make($request->images, $rules);
            if ($validator->fails()){
                 return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
            }
            foreach ($request->images as $key => $media_file) {
                $file_name = FileUploader::upload($media_file, 'public/storage/album/images', 1000, null, 300);
                $file_type = 'image';

                $albumimage = new Album_image();
                $albumimage->user_id = auth()->user()->id;
                $albumimage->album_id = $request->album;
                $albumimage->image = $file_name;
                if(isset($request->page_id) && !empty($request->page_id)){
                    $albumimage->page_id = $request->page_id;
                }elseif(isset($request->group_id) && !empty($request->group_id)){
                    $albumimage->group_id = $request->group_id;
                }else{
                    
                }
                $done = $albumimage->save();

                if(isset($request->profile_id) && !empty($request->profile_id)){
                    $data['publisher_id'] = auth()->user()->id;
                    $data['user_id'] = auth()->user()->id;
                    $data['publisher'] = 'post';
                    $data['post_type'] = 'general';
                    $data['privacy'] = 'public';
                    $data['privacy'] = 'public';
                    $data['status'] = 'active';
                    $data['tagged_user_ids'] = json_encode(array());
                    $data['user_reacts'] = json_encode(array());
                    $data['shared_user'] = json_encode(array());
                    $data['created_at'] = time();
                    $data['updated_at'] = $data['created_at'];
    
                    $post_id = Posts::insertGetId($data);
                    foreach ($request->images as $key => $media_file) {
                        $file_extention = strtolower($media_file->getClientOriginalExtension());
                        if ($file_extention == 'avi' || $file_extention == 'mp4' || $file_extention == 'webm' || $file_extention == 'mov' || $file_extention == 'wmv' || $file_extention == 'mkv') {
                            $file_name = FileUploader::upload($media_file, 'public/storage/post/videos');
                            $file_type = 'video';
                        } else {
                            $file_name = FileUploader::upload($media_file, 'public/storage/post/images', 1000, null, 300);
                            $file_type = 'image';
                        }
        
        
                        $media_file_data = array('user_id' => auth()->user()->id, 'post_id' => $post_id,'album_id' => $request->album, 'file_name' => $file_name, 'file_type' => $file_type, 'privacy' => $request->privacy);
                        $media_file_data['created_at'] = time();
                        $media_file_data['updated_at'] = $media_file_data['created_at'];
                        $done = Media_files::create($media_file_data);
                    }
                }
    
                if($done){
                    Session::flash('success_message', get_phrase('Your images is added to album'));
                    return json_encode(array('reload' => 1));
                }
                
            }
        }
    }


    public function search_group(){
        $search = $_GET['search'];
        $page_data['searchgroup'] = Group::where('title','like','%'.$search.'%')->get();
        $page_data['managegroups'] = Group::orderBy('id','DESC')->where('user_id',auth()->user()->id)->limit('6')->get();
        $page_data['joinedgroups'] = Group_member::where('user_id',auth()->user()->id)->where('is_accepted','1')->limit('6')->get();
        $page_data['view_path'] = 'frontend.groups.search-group';
        return view('frontend.index',$page_data);
    }

    public function group_all_view(){
        $page_data['managegroups'] = Group::orderBy('id','DESC')->where('user_id',auth()->user()->id)->limit('6')->get();
        $page_data['joinedgroups'] = Group_member::where('user_id',auth()->user()->id)->where('is_accepted','1')->limit('6')->get();
        $page_data['groups'] = Group::orderBy('id','DESC')->limit('8')->get();
        $page_data['view_path'] = 'frontend.groups.allgroup';
        return view('frontend.index',$page_data);
    }

    public function load_groups_by_scrolling(Request $request){
        $groups =  Group::skip($request->offset)->take(6)->orderBy('id', 'DESC')->get();

        $page_data['groups'] = $groups;
        return view('frontend.groups.group-single', $page_data);
    }


    public function group_user_create(){
        $page_data['managegroups'] = Group::orderBy('id','DESC')->where('user_id',auth()->user()->id)->limit('6')->get();
        $page_data['joinedgroups'] = Group_member::where('user_id',auth()->user()->id)->where('is_accepted','1')->limit('6')->get();
        $page_data['groups'] = Group::where('user_id',auth()->user()->id)->get();
        $page_data['view_path'] = 'frontend.groups.user-group';
        return view('frontend.index',$page_data);
    }


    public function group_user_joined(){
        $page_data['managegroups'] = Group::orderBy('id','DESC')->where('user_id',auth()->user()->id)->limit('6')->get();
        $page_data['joinedgroups'] = Group_member::where('user_id',auth()->user()->id)->where('is_accepted','1')->limit('6')->get();
        $page_data['groups'] = Group_member::where('user_id',auth()->user()->id)->where('is_accepted','1')->get();
        $page_data['view_path'] = 'frontend.groups.user-joined';
        return view('frontend.index',$page_data);
    }



    function search_friends_for_inviting(Request $request){
        $friends =  User::where('name', 'like', '%'.$request->search_value.'%')
            ->take(30)->get();

        $data['users'] = $friends;
        $data['group_id'] = $request->group_id;
        return view('frontend.groups.invite-user', $data);
    }


    public function sent_invition(Request $request){
        // return $request->all();
        $invited_group_users_id = $request->invited_group_users_id;
        $count = count($invited_group_users_id);
        
        for ($i=0; $i < $count; $i++) { 
            $invite = new Invite();
            $invite->invite_sender_id = auth()->user()->id;
            $invite->invite_reciver_id = $invited_group_users_id[$i];
            $invite->is_accepted = '0';
            $invite->group_id = $request->group_id;
            $invite->save();

            $notify = new Notification();
            $notify->sender_user_id = auth()->user()->id;
            $notify->reciver_user_id = $invited_group_users_id[$i];
            $notify->type = 'group';
            $notify->group_id = $request->group_id;
            $notify->save();
        }
        Session::flash('success_message', get_phrase('Group Invited Done Successfully'));
        return json_encode(array('reload' => 1));
    }



   


}
