<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Friendships;
use App\Models\Invite;
use App\Models\Notification;
use App\Models\User;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class NotificationController extends Controller
{
    public function notifications(){
        $date = Carbon::today();
        $page_data['new_notification'] = Notification::where('reciver_user_id',auth()->user()->id)->where('status','0')
        ->orderBy('id','DESC')->get();
        $page_data['older_notification'] = Notification::where('reciver_user_id',auth()->user()->id)->where('created_at','<',$date)->orderBy('id','DESC')->get();
        $page_data['view_path'] = 'frontend.notification.notification';
        return view('frontend.index',$page_data); 
    }



    public function accept_friend_notification($id){
        $response = array();
        $is_updated = Friendships::where('requester',$id)->where('accepter',auth()->user()->id)->update(['is_accepted'=>'1']);
        Notification::where('sender_user_id',$id)->where('reciver_user_id',auth()->user()->id)->update(['status'=>'1','view'=>'1']);


        if ($is_updated == 1) {
            //update my id to my friend list
            $my_friends = User::where('id', auth()->user()->id)->value('friends');
            $my_friends = json_decode($my_friends);
            if(is_array($my_friends)){
                array_push($my_friends, (int)$id);
            }else{
                $my_friends = [(int)$id];
            }
            $my_friends = json_encode($my_friends);

            User::where('id', auth()->user()->id)->update(['friends' => $my_friends]);


            //update my id to my friend list
            $my_friends_of_friends = User::where('id', $id)->value('friends');
            $my_friends_of_friends = json_decode($my_friends_of_friends);

            if(is_array($my_friends_of_friends)){
                array_push($my_friends_of_friends, (int)auth()->user()->id);
            }else{
                $my_friends_of_friends = [(int)auth()->user()->id];
            }
            $my_friends_of_friends = json_encode($my_friends_of_friends);

            User::where('id', $id)->update(['friends' => $my_friends_of_friends]);

        }

        $notify = new Notification();
        $notify->sender_user_id = auth()->user()->id;
        $notify->reciver_user_id = $id;
        $notify->type = "friend_request_accept";
        $notify->save();

        Session::flash('success_message', get_phrase('Friend Request Accepted'));
        $response = array('reload' => 1);
        return json_encode($response);
    }

    
    public function decline_friend_notification($id){
        $response = array();
        $friendship = Friendships::where('requester',$id)->where('accepter',auth()->user()->id)->delete();
        $notify = Notification::where('sender_user_id',$id)->where('reciver_user_id',auth()->user()->id)->delete();

        Session::flash('success_message', get_phrase('Cancle Friend Request'));
        $response = array('reload' => 1);
        return json_encode($response);
    }



    public function accept_group_notification($id,$group_id){
        $response = array();
        $is_updated = Invite::where('invite_sender_id',$id)->where('invite_reciver_id',auth()->user()->id)->where('group_id',$group_id)->update(['is_accepted'=>'1']);
        $notify = Notification::where('sender_user_id',$id)->where('reciver_user_id',auth()->user()->id)->update(['status'=>'1','view'=>'1']);

        $notify = new Notification();
        $notify->sender_user_id = auth()->user()->id;
        $notify->reciver_user_id = $id;
        $notify->type = "group_invitation_accept";
        $notify->save();
        Session::flash('success_message', get_phrase('Group Invitation Accepted'));
        $response = array('reload' => 1);
        return json_encode($response);
    }

    public function decline_group_notification($id,$group_id){
        $response = array();
        $is_updated = Invite::where('invite_sender_id',$id)->where('invite_reciver_id',auth()->user()->id)->where('group_id',$group_id)->delete();
        $notify = Notification::where('sender_user_id',$id)->where('reciver_user_id',auth()->user()->id)->delete();

        Session::flash('success_message', get_phrase('Group Invitation Canceled'));
        $response = array('reload' => 1);
        return json_encode($response);
    }





    public function accept_event_notification($id,$event_id){
        $response = array();
        $is_updated = Invite::where('invite_sender_id',$id)->where('invite_reciver_id',auth()->user()->id)->where('event_id',$event_id)->update(['is_accepted'=>'1']);
        $notify = Notification::where('sender_user_id',$id)->where('reciver_user_id',auth()->user()->id)->update(['status'=>'1','view'=>'1']);
        

        if ($is_updated == '1') {
            //update my friends id to my friend list
            $going_users_id = Event::where('id', $event_id)->value('going_users_id');
            $going_users_id = json_decode($going_users_id);
            array_push($going_users_id, (int)$id);
            $going_users_id = json_encode($going_users_id);

            Event::where('id', $event_id)->update(['going_users_id' => $going_users_id]);


        }

        $notify = new Notification();
        $notify->sender_user_id = auth()->user()->id;
        $notify->reciver_user_id = $id;
        $notify->type = "event_invitation_accept";
        $notify->save();

        Session::flash('success_message', get_phrase('Event Invitation Accepted'));
        $response = array('reload' => 1);
        return json_encode($response);
    }

    public function decline_event_notification($id,$event_id){
        $response = array();
        $is_updated = Invite::where('invite_sender_id',$id)->where('invite_reciver_id',auth()->user()->id)->where('event_id',$event_id)->delete();
        $notify = Notification::where('sender_user_id',$id)->where('reciver_user_id',auth()->user()->id)->delete();

        Session::flash('success_message', get_phrase('Event Invitation Canceled'));
        $response = array('reload' => 1);
        return json_encode($response);
    }




    public function mark_as_read($id){
        $response = array();
        Notification::where('id',$id)->update(['status'=>'1','view'=>'1']);

        Session::flash('success_message', get_phrase('Marked As Read'));
        $response = array('reload' => 1);
        return json_encode($response);
    }






}
