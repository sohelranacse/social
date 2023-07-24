<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB, Session;

//used models
use App\Models\FileUploader;
use App\Models\{Stories,Media_files};

class StoryController extends Controller
{
	private $user;

	function __construct(){
        $this->middleware(function ($request, $next) {
	        $this->user = Auth()->user();
	        return $next($request);
	    });
	}

    function stories($offset = 0, $limit = 5){
    	//Stories
        $stories =  DB::table('stories')
            ->join('users', 'stories.user_id', '=', 'users.id')
            ->select('stories.*', 'users.name', 'users.photo', 'users.friends', 'stories.created_at as created_at')
            ->where(function ($query) {
                $query->whereJsonContains('users.friends', [$this->user->id])
                ->where('stories.privacy', '!=', 'private')
                ->orWhere('stories.user_id', $this->user->id);
            })
            ->where('stories.status', 'active')
            ->where('stories.created_at', '>=', (time() - 86400))
            ->skip($offset)->take($limit)->orderBy('stories.story_id', 'DESC')->get();

    	$page_data['stories'] = $stories;
    	return view('frontend.story.single_story', $page_data);
    }

    function story_details($story_id = "", $offset = 0, $limit = 10){

        //First 10 stories
        $stories =  DB::table('stories')
            ->join('users', 'stories.user_id', '=', 'users.id')
            ->select('stories.*', 'users.name', 'users.photo', 'users.friends', 'stories.created_at as created_at')
            ->where(function ($query) {
                $query->whereJsonContains('users.friends', [$this->user->id])
                ->orWhere('stories.user_id', [$this->user->id]);
            })
            ->where('stories.privacy','!=', 'private')
            ->where('stories.created_at', '>=', (time() - 86400))
            ->where('stories.status', 'active')
            ->whereNotIn('stories.story_id', [$story_id])->orderBy('stories.story_id', 'DESC')->get();
        
        //Stories
        $story_details =  DB::table('stories')
        ->select('stories.*', 'users.name', 'users.photo', 'users.friends', 'stories.created_at as created_at')
        ->join('users', 'stories.user_id', '=', 'users.id')
        ->where('stories.story_id', $story_id)->get()->first();

        $page_data['stories'] = $stories;
        $page_data['story_details'] = $story_details;
        return view('frontend.story.story_details', $page_data);
    }

    function single_story_details($story_id = ""){
        //Stories
        $story_details =  DB::table('stories')
        ->select('stories.*', 'users.name', 'users.photo', 'users.friends', 'stories.created_at as created_at')
        ->join('users', 'stories.user_id', '=', 'users.id')
        ->where('stories.story_id', $story_id)->get()->first();

        $page_data['story_details'] = $story_details;
        return view('frontend.story.single_story_details', $page_data);
    }

    function create_story(Request $request){

        $all_data = $request->all();

        $data['publisher'] = $all_data['publisher'];
        $data['content_type'] = $all_data['content_type'];

        if($request->publisher == 'user'){
            $data['publisher_id'] = $this->user->id;
        }else{
            $data['publisher_id'] = $this->user->id;
        }

        if($request->content_type == 'text'){

            if(!empty($request->description)){
                $data['description'] = json_encode(
                    array('color' => $all_data['color'], 'bg-color' => $all_data['bg-color'], 'text' => $all_data['description'])
                );
            }else{
                return redirect('/');
            }
        }

        $data['privacy'] = $request->privacy;
        $data['created_at'] = time();
        $data['updated_at'] = $data['created_at'];
        $data['user_id'] = $this->user->id;
        $data['status'] = 'active';
        $story_id = Stories::insertGetId($data);

        if($request->content_type != 'text'){
            //add media files
            foreach ($request->story_files as $key => $media_file) {
                if(!empty($media_file)):
                    $file_extention = $media_file->getClientOriginalExtension();
                    if($file_extention == 'avi' || $file_extention == 'mp4' || $file_extention == 'webm' || $file_extention == 'mov' || $file_extention == 'wmv' || $file_extention == 'mkv'){
                        $file_name = FileUploader::upload($media_file,'public/storage/story/videos');
                        $file_type = 'video';
                    }else{
                        $file_name = FileUploader::upload($media_file,'public/storage/story/images', 800);
                        $file_type = 'image';
                    }


                    $media_file_data = array('user_id' => $this->user->id, 'story_id' => $story_id, 'file_name' => $file_name, 'file_type' => $file_type, 'privacy' => $request->privacy);
                    $media_file_data['created_at'] = time();
                    $media_file_data['updated_at'] = $media_file_data['created_at'];
                    Media_files::create($media_file_data);
                endif;
            }
        }

        return redirect('/');
    }
}
