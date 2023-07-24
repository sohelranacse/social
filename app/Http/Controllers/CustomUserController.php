<?php

namespace App\Http\Controllers;

use App\Models\Friendships;
use App\Models\User;
use App\Models\Posts;
use App\Models\Media_files;
use App\Models\Albums;
use App\Models\Notification;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\URL;
use Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class CustomUserController extends Controller
{
    // change pass
    public function changepass()
    {
        return view('frontend.user.change-password');
    }

    public function updatepass(Request $request)
    {
        $request->validate([
            'prevpass' => 'required',
            'password' => 'required|confirmed|min:8|different:prevpass',
        ]);
        if (Hash::check($request->prevpass, auth()->user()->password)) {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Session::flash('success_message', get_phrase('Password Changed Successfully'));
            return redirect()->route('timeline');
        } else {
            Session::flash('success_message', get_phrase('Previous Password does not Match, Try Again'));
            return redirect()->route('timeline');
        }
    }


   public function view_profile_data($id){
    $posts =  Posts::where('user_id', $id)->where('publisher','post')->where('privacy','public')->orderBy('post_id','DESC')->limit('10')->get();

    $page_data['posts'] = $posts;
    $page_data['user_data'] =  User::find($id);
    $page_data['view_path'] = 'frontend.user.single_user.user_view';
    return view('frontend.index', $page_data);

   }

   public function load_post_by_scrolling(Request $request){
    $posts =  Posts::where('user_id', $request->id)->where('publisher','post')->where('privacy','public')->skip($request->offset)->take(3)->orderBy('post_id', 'DESC')->get();
    $page_data['posts'] = $posts;
    $page_data['user_info'] = User::find($request->id);
    return view('frontend.main_content.posts', $page_data);

   }


   public function friend($id)
   {
        $response = array();
        $friendship = new Friendships();
        $friendship->accepter = $id;
        $friendship->requester = auth()->user()->id;
        $friendship->is_accepted = '0';
        $friendship->save();


        $notify = new Notification();
        $notify->sender_user_id = auth()->user()->id;
        $notify->reciver_user_id = $id;
        $notify->type = 'profile';
        $notify->save();


        Session::flash('success_message', get_phrase('Friend Request Sent Successfully'));
        $response = array('reload' => 1);
        return json_encode($response);
   }

   public function unfriend($id){
        $response = array();
        Friendships::where(function ($query) use ($id){
            $query->where('accepter',$id)->where('requester',auth()->user()->id);
        })->orWhere(function ($query) use ($id){
            $query->where('requester',$id)->where('accepter',auth()->user()->id);
        })->delete();

        //remove my id from this user table
        $unfriended_user_friends = User::where('id', $id)->value('friends');
        $unfriended_user_friends = json_decode($unfriended_user_friends, true);
        if(is_array($unfriended_user_friends)){
            $array_key =  array_search(auth()->user()->id,$unfriended_user_friends,true);
            unset($unfriended_user_friends[$array_key]);
        }else{
            $unfriended_user_friends = [];
        }
        $unfriended_user_friends = json_encode($unfriended_user_friends);
        User::where('id', $id)->update(['friends' => $unfriended_user_friends]);


        //remove user id from my user friend list
        $unfriended_user_friends = User::where('id', auth()->user()->id)->value('friends');
        $unfriended_user_friends = json_decode($unfriended_user_friends, true);
        if(is_array($unfriended_user_friends)){
            $array_key =  array_search($id,$unfriended_user_friends,true);
            unset($unfriended_user_friends[$array_key]);
        }else{
            $unfriended_user_friends = [];
        }
        $unfriended_user_friends = json_encode($unfriended_user_friends);
        User::where('id', auth()->user()->id)->update(['friends' => $unfriended_user_friends]);

        $notify = Notification::where('sender_user_id',auth()->user()->id)->where('reciver_user_id',$id)->delete();

        Session::flash('success_message', get_phrase('Removed from friend list'));
        $response = array('reload' => 1);
        return json_encode($response);
   }





   public function friends($id)
    {

        $friendships = Friendships::where(function ($query) use($id) {
            $query->where('accepter', $id)
                ->orWhere('requester', $id);
        })
            ->where('is_accepted', 1)
            ->orderBy('friendships.importance', 'desc')
            ->get();

        $friend_requests = Friendships::where('accepter', $id)
            ->where('is_accepted', '!=', 1)
            ->take(15)->get();

        $page_data['friendships'] = $friendships;
        $page_data['friend_requests'] = $friend_requests;

        $page_data['user_data'] = User::find($id);
        $page_data['view_path'] = 'frontend.user.single_user.user_view';
        return view('frontend.index', $page_data);
    }

    function photos($id)
    {

       $all_photos = Media_files::where('user_id', $id)
            ->where('file_type', 'image')
            ->whereNull('page_id')
            ->whereNull('story_id')
            ->whereNull('product_id')
            ->whereNull('group_id')
            ->whereNull('chat_id')
            ->orderBy('id', 'DESC')->get();

        $all_albums = Albums::where('user_id', $id)
            ->whereNull('page_id')
            ->whereNull('group_id')
            ->take(6)->orderBy('id', 'DESC')->get();

        $page_data['all_photos'] = $all_photos;
        $page_data['all_albums'] = $all_albums;
        $page_data['user_data'] = User::find($id);
        $page_data['view_path'] = 'frontend.user.single_user.user_view';
        return view('frontend.index', $page_data);
    }

    function videos($id)
    {

        $all_videos = Media_files::where('user_id', $id)
            ->where('file_type', 'video')
            ->whereNull('story_id')
            ->whereNull('page_id')
            ->whereNull('album_id')
            ->whereNull('product_id')
            ->whereNull('chat_id')
            ->orderBy('id', 'DESC')->get();

        $page_data['all_videos'] = $all_videos;
        $page_data['user_data'] = User::find($id);
        $page_data['view_path'] = 'frontend.user.single_user.user_view';
        return view('frontend.index', $page_data);
    }



    public function delete_mediafile($id){
        $response = array();
        $media_file = Media_files::find($id);
        $media_file->delete();
        Session::flash('success_message', get_phrase('Deleted successfully'));
        $response = array('reload' => 1);
        return json_encode($response);
    }

    public function download_mediafile($id){
        $media_file = Media_files::find($id);
        $filename = public_path(). "/storage/post/videos/".$media_file->file_name;
        if (File::exists($filename)) {
            return Response::download($filename);
        }else{
            return back();
        }
        
    }



    public function download_mediafile_image($id){
        $media_file = Media_files::find($id);
        $filename = public_path(). "/storage/post/images/".$media_file->file_name;
        $headers = array(
            'Content-Type: application',
          );

        if (File::exists($filename)) {
            return Response::download($filename);
        }else{
            return back();
        }
    }



}
