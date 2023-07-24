<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Saveforlater;
use App\Models\Video;
use App\Models\FileUploader;
//Used for Form data validation
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Session;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function videos()
    {
        $page_data['vidoes'] = Video::where('category', 'video')->where('privacy', 'public')->orderBy('id', 'DESC')->limit(5)->get();
        $page_data['view_path'] = 'frontend.video-shorts.video';
        return view('frontend.index', $page_data);
    }


    public function store(Request $request)
    {
        
        $rules = array('video' => 'required|file|mimes:mp4,mov,wmv,mkv,webm,avi,m4v| max:500000');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }

        $file_name = FileUploader::upload($request->video,'public/storage/videos');

        $video = new Video();
        $video->title = $request->title;
        $video->user_id = auth()->user()->id;
        $video->privacy = $request->privacy;
        $video->category = $request->category;
        $video->file = $file_name;
        $video->view = json_encode(array());
        $done = $video->save();
        if ($done) {
            $post = new Posts();
            $post->user_id = auth()->user()->id;
            $post->publisher = 'video_and_shorts';
            $post->publisher_id = $video->id;
            $post->post_type = $request->category;
            $post->privacy = $request->privacy;
            $post->description = $request->title;
            $post->tagged_user_ids = json_encode(array());
            $post->user_reacts = json_encode(array());
            $post->status = 'active';
            $post->created_at = time();
            $post->updated_at = time();
            $post->save();
        }
        Session::flash('success_message', get_phrase('Video/Shorts Created Successfully'));
        return json_encode(array('reload' => 1));
    }

    public function videoinfo($id){
        $page_data['post'] = Posts::where('posts.privacy', '!=', 'private')
        ->where('posts.publisher', 'video_and_shorts')
        ->where('posts.publisher_id', $id)
        ->where('posts.status', 'active')
        ->first();
        
        $video = Video::find($id);
        $page_data['video'] = $video;
        $video_view_data = json_decode($video->view);
        if (!in_array(auth()->user()->id, $video_view_data)){
            array_push($video_view_data, auth()->user()->id);
            $video->view =  json_encode($video_view_data);
            $video->save();
        }
        $page_data['letestvideos'] = Video::where('category', 'video')->where('privacy', 'public')->orderBy('id', 'DESC')->limit('5')->get();
        $last_data = Video::latest()->first();
        if($last_data->id == $id){
            $page_data['vidoes'] = Video::where('id','<',$id)->where('category', 'video')->where('privacy', 'public')->orderBy('id', 'DESC')->limit('2')->get();
        }else{
            $page_data['vidoes'] = Video::where('id','>',$id)->where('category', 'video')->where('privacy', 'public')->orderBy('id', 'ASC')->limit('2')->get();
        }
        $page_data['view_path'] = 'frontend.video-shorts.video-detail';
        return view('frontend.index', $page_data);
    }


    public function load_videos_by_scrolling(Request $request)
    {
        $vidoes =  Video::where('category', 'video')->where('privacy', 'public')->skip($request->offset)->take(5)->orderBy('id', 'DESC')->get();
        $page_data['vidoes'] = $vidoes;
        return view('frontend.video-shorts.single-video', $page_data);
    }



    public function shorts(){
        $page_data['shorts'] = Video::where('category', 'shorts')->where('privacy', 'public')->orderBy('id', 'DESC')->limit(5)->get();
        $page_data['view_path'] = 'frontend.video-shorts.shorts';
        return view('frontend.index', $page_data);
    }


    public function load_shorts_by_scrolling(Request $request){
        $shorts =  Video::where('category', 'shorts')->where('privacy', 'public')->skip($request->offset)->take(5)->orderBy('id', 'DESC')->get();
        $page_data['shorts'] = $shorts;
        return view('frontend.video-shorts.shorts-single', $page_data);
    }


    public function save_for_later($id){
        $saveforlater = new Saveforlater();
        $saveforlater->user_id = auth()->user()->id;
        $saveforlater->video_id = $id;
        $saveforlater->save();
        Session::flash('success_message', get_phrase('Saved Successfully'));
        $response = array('reload' => 1);
        return json_encode($response);
    }


    public function unsave_for_later($id){
        $done = Saveforlater::where('video_id',$id)->where('user_id',auth()->user()->id)->delete();
        if($done){
        Session::flash('success_message', get_phrase('Unsaved Successfully'));
        $response = array('reload' => 1);
            return json_encode($response);
        }
    }


    public function save_all(){
        $page_data['videos'] = Saveforlater::where('user_id',auth()->user()->id)->whereNotNull('video_id')->whereNull('group_id')->whereNull('post_id')->whereNull('marketplace_id')->whereNull('event_id')->whereNull('blog_id')->get();
        $page_data['view_path'] = 'frontend.video-shorts.saved';
        return view('frontend.index', $page_data);
    }




    public function video_delete()
    {
        $response = array();
        $video = Video::find($_GET['video_id']);
        // store image name for delete file operation 
        $file = $video->file;

        $done = $video->delete();
        if ($done) {
            $response = array('alertMessage' => get_phrase('Video Deleted Successfully'), 'fadeOutElem' => "#video-" . $_GET['video_id']);
            // just put the file name and folder name nothing more :) 
            removeFile('video', $file);
        }
        return json_encode($response);
    }



}
