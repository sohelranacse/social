<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use DB;

//used models
use App\Models\{Stories, Posts, Comments, Feeling_and_activities, CommonModels, Live_streamings, Media_files, Post_share, Report, User, FileUploader};

//For used ZOOM
use App\Traits\ZoomMeetingTrait;

use Session, Image, Share;

//Used for Form data validation
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\JoinClause;



class MainController extends Controller
{
    use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    private $user;

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth()->user();
            return $next($request);
        });

        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    function timeline()
    {


        //First 10 stories
        $stories =  Stories::where(function ($query) {
            $query->whereJsonContains('users.friends', [$this->user->id])
                ->where('stories.privacy', '!=', 'private')
                ->orWhere('stories.user_id', $this->user->id);
            })
            ->where('stories.status', 'active')
            ->where('stories.created_at', '>=', (time() - 86400))
            ->join('users', 'stories.user_id', '=', 'users.id')
            ->select('stories.*', 'users.name', 'users.photo', 'users.friends', 'stories.created_at as created_at')
            ->take(5)->orderBy('stories.story_id', 'DESC')->get();


        //First 10 posts
        $posts =  Posts::where(function ($query) {
            $query->whereJsonContains('users.friends', [$this->user->id])
                ->where('posts.privacy', '!=', 'private')
                ->orWhere('posts.user_id', $this->user->id);
            })
            ->where('posts.status', 'active')
            ->where('posts.report_status', '0')
            ->join('users', 'posts.user_id', '=', 'users.id')

            ->where(function($query){
                $query->where('posts.publisher', '!=', 'video_and_shorts')
                ->orWhere(function($query2){
                    $query2->join('group_members', function (JoinClause $join) {
                        $join->on('posts.publisher_id', '=', 'group_members.group_id')
                             ->where('posts.publisher', '=', 'group')
                             ->where('group_members.user_id', '=', auth()->user()->id);
                    });
                });
            })

            
            ->select('posts.*', 'users.name', 'users.photo', 'users.friends', 'posts.created_at as created_at')
            ->take(5)->orderBy('posts.post_id', 'DESC')->get();



        $page_data['stories'] = $stories;
        $page_data['posts'] = $posts;
        $page_data['view_path'] = 'frontend.main_content.index';
        return view('frontend.index', $page_data);
    }

    function load_post_by_scrolling(Request $request)
    {

        $posts =  Posts::where(function ($query) {
            $query->whereJsonContains('users.friends', [$this->user->id])
                ->where('posts.privacy', '!=', 'private')
                ->orWhere('posts.user_id', $this->user->id);
        })
            ->where('posts.status', 'active')
            ->where('posts.publisher', 'post')
            ->where('posts.report_status', '0')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name', 'users.photo', 'users.friends', 'posts.created_at as created_at')
            ->skip($request->offset)->take(3)->orderBy('posts.post_id', 'DESC')->get();

        $page_data['user_info'] = $this->user;
        $page_data['posts'] = $posts;
        $page_data['type'] = 'user_post';
        return view('frontend.main_content.posts', $page_data);
    }

    function create_post(Request $request)
    {

        //Data validation

        $rules = array('privacy' => ['required', Rule::in(['private', 'public', 'friends'])]);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }


        if (is_array($request->multiple_files) && $request->multiple_files[0] != null) {
            //Data validation

            $rules = array('multiple_files.*' => 'mimes:jpeg,png,jpg,gif,svg,mp4,mov,wmv,avi,webm|max:500000');
            // $rules = array('multiple_files.*' => 'mimes:mp4,mov,wmv,avi,WEBM,mkv|max:20048');
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $validation_errors = $validator->getMessageBag()->toArray();
                foreach ($validation_errors as $key => $validation_error) {
                    $fileIndex = explode('.', $key);
                    if (array_key_exists('multiple_files.' . $fileIndex[1], $validation_errors)) {
                        $validation_errors['multiple_files'] = $validation_errors['multiple_files.' . $fileIndex[1]];
                    }
                    unset($validation_errors['multiple_files.' . $fileIndex[1]]);
                }

                return json_encode(array('validationError' => $validation_errors));
            }
        }



        $data['user_id'] = $this->user->id;
        $data['privacy'] = $request->privacy;

        if (isset($request->publisher) && !empty($request->publisher)) {
            $data['publisher'] = $request->publisher;
        } else {
            $data['publisher'] = 'post';
        }


        if (isset($request->event_id) && !empty($request->event_id)) {
            $data['publisher_id'] = $request->event_id;
        } elseif (isset($request->page_id) && !empty($request->page_id)) {
            $data['publisher_id'] = $request->page_id;
        } elseif (isset($request->group_id) && !empty($request->group_id)) {
            $data['publisher_id'] = $request->group_id;
        } else {
            $data['publisher_id'] = $this->user->id;
        }
        //post type
        if (isset($request->post_type) && !empty($request->post_type)) {
            $data['post_type'] = $request->post_type;
        } else {
            $data['post_type'] = 'general';
        }

        if (isset($request->tagged_users_id) && is_array($request->tagged_users_id)) {
            $tagged_users = $request->tagged_users_id;
        } else {
            $tagged_users = array();
        }
        $data['tagged_user_ids'] = json_encode($tagged_users);


        if (isset($request->feeling_and_activity_id) && !empty($request->feeling_and_activity_id)) {
            $data['activity_id'] = $request->feeling_and_activity_id;
        } else {
            $data['activity_id'] = 0;
        }

        if (isset($request->address) && !empty($request->address)) {
            $data['location'] = $request->address;
        } else {
            $data['location'] = '';
        }


        if (isset($request->description) && !empty($request->description)) {
            $data['description'] = $request->description;
        } else {
            $data['description'] = '';
        }

        $data['status'] = 'active';
        $data['user_reacts'] = json_encode(array());
        $data['shared_user'] = json_encode(array());
        $data['created_at'] = time();
        $data['updated_at'] = $data['created_at'];

        $post_id = Posts::insertGetId($data);

        //add media files
        if (is_array($request->multiple_files) && $request->multiple_files[0] != null) {
            //Data validation

            $rules = array('multiple_files.*' => 'mimes:jpeg,png,jpg,gif,svg,mp4,mov,wmv,avi,webm|max:500000',);
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $validation_errors = $validator->getMessageBag()->toArray();
                foreach ($validation_errors as $key => $validation_error) {
                    $fileIndex = explode('.', $key);
                    if (array_key_exists('multiple_files.' . $fileIndex[1], $validation_errors)) {
                        $validation_errors['multiple_files'] = $validation_errors['multiple_files.' . $fileIndex[1]];
                    }
                    unset($validation_errors['multiple_files.' . $fileIndex[1]]);
                }

                return json_encode(array('validationError' => $validation_errors));
            }



            foreach ($request->multiple_files as $key => $media_file) {
                $file_name = random(40);
                $file_extention = strtolower($media_file->getClientOriginalExtension());
                if ($file_extention == 'avi' || $file_extention == 'mp4' || $file_extention == 'webm' || $file_extention == 'mov' || $file_extention == 'wmv' || $file_extention == 'mkv') {
                    FileUploader::upload($media_file, 'public/storage/post/videos/'. $file_name . '.' . $file_extention);
                    $file_type = 'video';
                } else {
                    FileUploader::upload($media_file, 'public/storage/post/images/'.$file_name.'.'.$file_extention, 1000, null, 300);
                    $file_type = 'image';
                }
                $file_name = $file_name . '.' . $file_extention;


                $media_file_data = array('user_id' => auth()->user()->id, 'post_id' => $post_id, 'file_name' => $file_name, 'file_type' => $file_type, 'privacy' => $request->privacy);


                if (isset($request->page_id) && !empty($request->page_id)) {
                    $media_file_data['page_id'] = $request->page_id;
                } elseif (isset($request->group_id) && !empty($request->group_id)) {
                    $media_file_data['group_id'] = $request->group_id;
                } else {
                }
                $media_file_data['created_at'] = time();
                $media_file_data['updated_at'] = $media_file_data['created_at'];
                Media_files::create($media_file_data);
            }
        }




        if ($data['post_type'] == 'live_streaming') {
            //Live streaming
            $this->create_live_streaming('post', $post_id);
            $response = array('url' => url('/live/' . $post_id), 'reload' => 0, 'status' => 1, 'function' => 0, 'messageShowOn' => '[name=about]', 'message' => get_phrase('Post has been added to your timeline'));
        } else {
            //Ajax flush message
            Session::flash('success_message', get_phrase('Your post has been published'));
            $response = array('reload' => 1);
        }
        return json_encode($response);
    }

    function edit_post_form($id){
        $page_data['post'] = Posts::where('post_id', $id)->first();
        return view('frontend.main_content.edit_post_modal', $page_data);
    }


    function edit_post($id, Request $request)
    {
        //$posts = Posts::where('id', $id)->first();

        $rules = array('privacy' => ['required', Rule::in(['private', 'public', 'friends'])]);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }


        if (is_array($request->multiple_files) && $request->multiple_files[0] != null) {
            //Data validation

            $rules = array('multiple_files.*' => 'mimes:jpeg,png,jpg,gif,svg,mp4,mov,wmv,avi,webm|max:20480');
            // $rules = array('multiple_files.*' => 'mimes:mp4,mov,wmv,avi,WEBM,mkv|max:20048');
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $validation_errors = $validator->getMessageBag()->toArray();
                foreach ($validation_errors as $key => $validation_error) {
                    $fileIndex = explode('.', $key);
                    if (array_key_exists('multiple_files.' . $fileIndex[1], $validation_errors)) {
                        $validation_errors['multiple_files'] = $validation_errors['multiple_files.' . $fileIndex[1]];
                    }
                    unset($validation_errors['multiple_files.' . $fileIndex[1]]);
                }

                return json_encode(array('validationError' => $validation_errors));
            }
        }



        $data['privacy'] = $request->privacy;


        if (isset($request->tagged_users_id) && is_array($request->tagged_users_id)) {
            $tagged_users = $request->tagged_users_id;
            $data['tagged_user_ids'] = json_encode($tagged_users);
        }
        

        if (isset($request->feeling_and_activity_id) && !empty($request->feeling_and_activity_id)) {
            $data['activity_id'] = $request->feeling_and_activity_id;
        }

        if (isset($request->description) && !empty($request->description)) {
            $data['description'] = $request->description;
        }

        $data['updated_at'] = time();

        Posts::where('post_id', $id)->update($data);

        //add media files
        if (is_array($request->multiple_files) && $request->multiple_files[0] != null) {
            //Data validation

            $rules = array('multiple_files.*' => 'mimes:jpeg,png,jpg,gif,svg,mp4,mov,wmv,avi,webm|max:20480',);
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $validation_errors = $validator->getMessageBag()->toArray();
                foreach ($validation_errors as $key => $validation_error) {
                    $fileIndex = explode('.', $key);
                    if (array_key_exists('multiple_files.' . $fileIndex[1], $validation_errors)) {
                        $validation_errors['multiple_files'] = $validation_errors['multiple_files.' . $fileIndex[1]];
                    }
                    unset($validation_errors['multiple_files.' . $fileIndex[1]]);
                }

                return json_encode(array('validationError' => $validation_errors));
            }



            foreach ($request->multiple_files as $key => $media_file) {
                $file_name = random(40);
                $file_extention = strtolower($media_file->getClientOriginalExtension());
                if ($file_extention == 'avi' || $file_extention == 'mp4' || $file_extention == 'webm' || $file_extention == 'mov' || $file_extention == 'wmv' || $file_extention == 'mkv') {
                    $media_file->move('public/storage/post/videos/', $file_name . '.' . $file_extention);
                    $file_type = 'video';
                } else {
                    FileUploader::upload($media_file, 'public/storage/post/images/'.$file_name.'.'.$file_extention, 1000, null, 300);
                    $file_type = 'image';
                }
                $file_name = $file_name . '.' . $file_extention;


                $media_file_data = array('user_id' => auth()->user()->id, 'post_id' => $id, 'file_name' => $file_name, 'file_type' => $file_type, 'privacy' => $request->privacy);


                if (isset($request->page_id) && !empty($request->page_id)) {
                    $media_file_data['page_id'] = $request->page_id;
                } elseif (isset($request->group_id) && !empty($request->group_id)) {
                    $media_file_data['group_id'] = $request->group_id;
                } else {
                }
                $media_file_data['created_at'] = time();
                $media_file_data['updated_at'] = $media_file_data['created_at'];
                Media_files::create($media_file_data);
            }
        }




        //Ajax flush message
        Session::flash('success_message', get_phrase('Your post has been updated'));
        $response = array('reload' => 1);
        return json_encode($response);
    }


    function create_live_streaming($publisher, $publisher_id)
    {
        // return $publisher;
        $post_details = Posts::where('posts.status', 'active')
            ->where('posts.post_id', $publisher_id)
            ->join('users', 'posts.user_id', '=', 'users.id')->first();

        $live_streaming = Live_streamings::where('publisher', $publisher)
            ->where('user_id', $this->user->id)->where('publisher_id', $publisher_id);
            

        if ($live_streaming->count() > 0) {
            //Update
            $meeting_details = json_decode($live_streaming->value('details'), true);
            if(!empty($post_details->description)){
                $live_topic = ellipsis($post_details->description, 200);
            }else{
                $live_topic = "Live";
            }

            $meeting_details['topic'] = $live_topic;
            $meeting_details['start_time'] = $this->toZoomTimeFormat(time());

            $path = 'meetings/' . $meeting_details['id'];
            $response = $this->zoomPatch($path, [
                'topic' => $meeting_details['topic'],
                'type' => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $meeting_details['start_time'],
                'duration' => 40,
                'agenda' => null,
                'settings' => [
                    'host_video' => true,
                    'participant_video' => true,
                    'waiting_room' => false,
                ]
            ]);

            $data['publisher'] = $publisher;
            $data['publisher_id'] = $publisher_id;
            $data['details'] = json_encode($meeting_details);
            $data['updated_at'] = time();
            Live_streamings::where('streaming_id', $live_streaming->value('streaming_id'))->update($data);
        } else {
            if(!empty($post_details->description)){
                $live_topic = ellipsis($post_details->description, 200);
            }else{
                $live_topic = "Live";
            }
            
            //Create
            $path = 'users/me/meetings';
            $response = $this->zoomPost($path, [
                'topic' => $live_topic,
                'type' => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat(time()),
                'duration' => 40,
                'agenda' => null,
                'settings' => [
                    'host_video' => true,
                    'participant_video' => true,
                    'waiting_room' => false,
                ]
            ]);

            $var =  array('success' => $response->status() === 201, 'data' => $response->body());

            $data['publisher'] = $publisher;
            $data['publisher_id'] = $publisher_id;
            $data['user_id'] = $this->user->id;
            $data['details'] = $var['data'];
            $data['created_at'] = time();
            $data['updated_at'] = $data['created_at'];
            Live_streamings::create($data);
        }
    }

    function live($post_id)
    {

        $post_details = Posts::where(function ($query) {
            $query->whereJsonContains('users.friends', [$this->user->id])
                ->where('posts.privacy', '!=', 'private')
                ->orWhere('posts.user_id', $this->user->id);
        })
            ->where('posts.post_id', $post_id)
            ->where('posts.status', 'active')
            ->join('users', 'posts.user_id', '=', 'users.id');

        if ($post_details->count() > 0) {

            $post_details = $post_details->first();

            $live_streaming = Live_streamings::where('publisher', 'post')
                ->where('publisher_id', $post_id)
                ->where('user_id', $post_details->user_id);

            if ($live_streaming->get()->count() > 0) {
                $live_streaming = $live_streaming->first();

                $page_data['meeting_details'] = json_decode($live_streaming->details, true);

                if ($post_details->user_id == $this->user->id) {
                    $page_data['host'] = 1;
                    $page_data['isSupportAV'] = 1;
                    $page_data['disableJoinAudio'] = 0;
                } else {
                    $page_data['host'] = 0;
                    $page_data['isSupportAV'] = 0;
                    $page_data['disableJoinAudio'] = 1;
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }

        $page_data['post_details'] = $post_details;

        return view('frontend.live_streaming.index', $page_data);
    }

    function live_ended($post_id){
        Posts::where('post_id', $post_id)->update(['description' => json_encode(['live_video_ended' => 'yes'])]);
        return redirect()->route('timeline');
    }

    function search_friends_for_tagging(Request $request)
    {
        $friends =  DB::table('users')->whereJsonContains('friends', [$this->user->id])
            ->where('name', 'like', '%' . $request->search_value . '%')
            ->take(30)->get();

        $data['friends'] = $friends;
        return view('frontend.main_content.friend_list_for_tagging', $data);
    }


    function my_react(Request $request)
    {
        $form_data = $request->all();

        if ($form_data['type'] == 'post') {
            $post_data =  Posts::where('post_id', $form_data['post_id'])->get()->first();

            $all_reacts = json_decode($post_data['user_reacts'], true);


            if ($form_data['request_type'] == 'update') {
                $all_reacts[$this->user->id] = $form_data['react'];
            }

            if ($form_data['request_type'] == 'toggle') {
                if (array_key_exists($this->user->id, $all_reacts)) {
                    unset($all_reacts[$this->user->id]);
                } else {
                    $all_reacts[$this->user->id] = 'like';
                }
            }

            $data['user_reacts'] = json_encode($all_reacts);
            Posts::where('post_id', $form_data['post_id'])->update($data);


            $page_data['user_reacts'] = $all_reacts;
            $page_data['user_info'] = $this->user;
            $page_data['ajax_call'] = true;
            $page_data['my_react'] = true;
            $page_data['post_react'] = true;

            if($form_data['response_type'] == 'number'){
                return count($all_reacts);
            }else{
                return view('frontend.main_content.post_reacts', $page_data);
            }
        }
    }

    function my_comment_react(Request $request)
    {
        $form_data = $request->all();

        $comment_data =  Comments::where('comment_id', $form_data['comment_id'])->get()->first();

        $all_reacts = json_decode($comment_data['user_reacts'], true);


        if ($form_data['request_type'] == 'update') {
            $all_reacts[$this->user->id] = $form_data['react'];
        }

        if ($form_data['request_type'] == 'toggle') {
            if (array_key_exists($this->user->id, $all_reacts)) {
                unset($all_reacts[$this->user->id]);
            } else {
                $all_reacts[$this->user->id] = 'like';
            }
        }

        $data['user_reacts'] = json_encode($all_reacts);
        Comments::where('comment_id', $form_data['comment_id'])->update($data);


        $page_data['user_comment_reacts'] = $all_reacts;
        $page_data['user_info'] = $this->user;
        $page_data['ajax_call'] = true;
        $page_data['my_react'] = true;
        $page_data['comment_react'] = true;
        return view('frontend.main_content.comment_reacts', $page_data);
    }

    function load_post_comments(Request $request)
    {
        $post =  Posts::where('posts.status', 'active')
            ->where('posts.post_id', $request->post_id)
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name', 'users.photo', 'users.friends', 'posts.created_at as created_at')->get()->first();

        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.is_type', $request->type)
            ->where('comments.id_of_type', $request->post_id)
            ->where('comments.parent_id', $request->parent_id)
            ->select('comments.*', 'users.name', 'users.photo')
            ->orderBy('comment_id', 'DESC')->skip($request->total_loaded_comments)->take(3)->get();

        $page_data['post'] = $post;
        $page_data['type'] = $request->type;
        $page_data['post_id'] = $request->post_id;
        if ($request->parent_id == 0) {
            $page_data['comments'] = $comments;
            return view('frontend.main_content.comments', $page_data);
        } else {
            $page_data['child_comments'] = $comments;
            return view('frontend.main_content.child_comments', $page_data);
        }
    }

    function post_comment(Request $request)
    {
        $form_data = $request->all();

        $data['description'] = $form_data['description'];

        if ($form_data['comment_id'] > 0) {
            $data['updated_at'] = time();
            Comments::where('comment_id', $form_data['comment_id'])->where('user_id', $this->user->id)->update($data);
            $comment_id = $form_data['comment_id'];
        } else {
            $data['parent_id'] = $form_data['parent_id'];
            $data['user_id'] = $this->user->id;
            $data['is_type'] = $form_data['type'];
            $data['id_of_type'] = $form_data['post_id'];
            $data['user_reacts'] = json_encode(array());
            $data['created_at'] = time();
            $data['updated_at'] = $data['created_at'];
            $comment_id = Comments::insertGetId($data);
        }


        $post =  Posts::where('posts.post_id', $form_data['post_id'])
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name', 'users.photo', 'users.friends', 'posts.created_at as created_at')->get()->first();

        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.is_type', $form_data['type'])
            ->where('comments.comment_id', $comment_id)->get();

        $page_data['post'] = $post;
        $page_data['type'] = $form_data['type'];
        $page_data['post_id'] = $form_data['post_id'];

        $total_comments = Comments::where('is_type', $form_data['type'])->where('id_of_type', $form_data['post_id'])->get()->count();

        if ($request->parent_id == 0) {
            $page_data['comments'] = $comments;
            return view('frontend.main_content.comments', $page_data);
        } else {
            $page_data['child_comments'] = $comments;
            return view('frontend.main_content.child_comments', $page_data);
        }
    }

    function preview_post(Request $request)
    {

        //Previw post
        $posts =  Posts::where(function ($query) {
                $query->where('posts.privacy', '!=', 'private')
                ->orWhere('posts.user_id', $this->user->id);
        })
            ->where('posts.post_id', $request->post_id)
            ->where('posts.status', 'active')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name', 'users.photo', 'users.friends', 'posts.created_at as created_at')
            ->take(1)->orderBy('posts.post_id', 'DESC')->get();


        $page_data['posts'] = $posts;
        $page_data['file_name'] = $request->file_name;
        $page_data['user_info'] = $this->user;
        return view('frontend.main_content.preview_post', $page_data);
    }





    public function post_comment_count(Request $request)
    {
        $form_data = $request->all();
        return $total_child_comments = Comments::where('is_type', $form_data['type'])->where('id_of_type', $form_data['post_id'])->get()->count();
    }




    public function single_post($id)
    {
        
        $post =  Posts::where('post_id', $id)->first();
        if (!empty($post)) {
            $page_data['post'] = $post;
            $page_data['user_info'] = auth()->user();
            $page_data['type'] = 'user_post';
            $page_data['view_path'] = 'frontend.main_content.single-post';

            if(isset($_GET['shared'])){
                return view('frontend.main_content.custom_shared_view', $page_data);
            }else{
                return view('frontend.index', $page_data);
            }
        } else {

            if(isset($_GET['shared'])){
                $page_data['post'] = '';
                return view('frontend.main_content.custom_shared_view', $page_data);
            }else{
                $page_data['post'] = '';
                $page_data['view_path'] = 'frontend.main_content.custom_shared_view';
                return view('frontend.index', $page_data);
            }
        }
    }




    public function save_post_report(Request $request)
    {

        $report = new Report();

        $report->user_id = auth()->user()->id;
        $report->post_id = $request->post_id;
        $report->report = $request->report;
        $report->save();
        Session::flash('success_message', get_phrase('Report Done Successfully'));
        return json_encode(array('reload' => 1));
    }


    public function comment_delete()
    {
        $response = array();
        $comment_id = $_GET['comment_id'];
        $done = Comments::where('comment_id', $comment_id)->delete();
        if ($done) {
            $response = array('alertMessage' => get_phrase('Comment Deleted Successfully'), 'fadeOutElem' => "#comment_" . $_GET['comment_id']);
        }
        return json_encode($response);
    }



    public function share_group(Request $request)
    {
        $postshare = new Post_share();
        $postshare->user_id = auth()->user()->id;
        $postshare->post_id = $request->shared_post_id;
        $postshare->shared_on = 'group';
        $postshare->save();


        $post = new Posts();
        $post->user_id = auth()->user()->id;
        $post->publisher = 'group';
        $post->publisher_id = $request->group_id;
        $post->post_type = "general";
        $post->privacy = "public";
        $post->tagged_user_ids = json_encode(array());
        if (isset($request->shared_post_id) && !empty($request->shared_post_id)) {
            $post->description = $request->message;
        }
        if (isset($request->shared_product_id) && !empty($request->shared_product_id)) {
            $post->description = $request->productUrl;
        }
        $post->status = 'active';
        $post->user_reacts = json_encode(array());
        $post->shared_user = json_encode(array());
        $time = time();
        $post->created_at = $time;
        $post->updated_at = $time;
        $done = $post->save();

        $response = array('alertMessage' => get_phrase('Posted On Group Successfully'));
        return json_encode($response);
    }


    public function share_my_timeline(Request $request)
    {
        $postshare = new Post_share();
        $postshare->user_id = auth()->user()->id;
        $postshare->post_id = $request->shared_post_id;
        $postshare->shared_on = 'group';
        $postshare->save();


        $post = new Posts();
        $post->user_id = auth()->user()->id;
        $post->publisher = 'post';
        $post->publisher_id = auth()->user()->id;
        $post->post_type = "share";
        $post->privacy = "public";
        $post->tagged_user_ids = json_encode(array());
        if (isset($request->shared_post_id) && !empty($request->shared_post_id)) {
            $post->description = $request->postUrl;
        }
        if (isset($request->shared_product_id) && !empty($request->shared_product_id)) {
            $post->description = $request->productUrl;
        }
        $post->status = 'active';
        $post->user_reacts = json_encode(array());
        $post->shared_user = json_encode(array());
        $time = time();
        $post->created_at = $time;
        $post->updated_at = $time;
        $done = $post->save();

        Session::flash('success_message', get_phrase('Posted On My Timeline Successfully'));
        return json_encode(array('url' => route('profile')));
    }



    // post delete 

    public function post_delete()
    {
        $response = array();
        $done = Posts::where('post_id', $_GET['post_id'])->delete();
        if ($done) {
            $response = array('alertMessage' => get_phrase('Post Deleted Successfully'), 'fadeOutElem' => "#postIdentification" . $_GET['post_id']);
        }
        return json_encode($response);
    }




    public function custom_shared_post_view($id)
    {


        $post =  Posts::where(function ($query) {
            $query->whereJsonContains('users.friends', [$this->user->id])
                ->where('posts.privacy', '!=', 'private')
                ->orWhere('posts.user_id', $this->user->id);
        })
        ->where('posts.post_id', $id)
        ->where('posts.status', 'active')
        ->where('posts.report_status', '0')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*', 'users.name', 'users.photo', 'users.friends', 'posts.created_at as created_at')->first();


        $page_data['post'] = $post;
        $page_data['type'] = 'user_post';
        return view('frontend.main_content.custom_shared_view', $page_data);
    }

    function delete_media_file($id){
        $media_file = Media_files::where('id', $id)->where('user_id', auth()->user()->id);
        if($media_file->count() > 0){
            remove_file('public/storage/post/images/'.$media_file->first()->file_name);
            Media_files::find($id)->delete();
            $response = array('alertMessage' => get_phrase('Image deleted successfully'), 'fadeOutElem' => "#previous-uploaded-img-". $id);
        }else{
            $response = array('alertMessage' => get_phrase('Image not found'));
        }

        return json_encode($response);
    }
}
