<?php

namespace App\Http\Controllers;

use App\Models\Friendships;
use App\Models\Page;
use App\Models\Posts;
use App\Models\Page_like;
use App\Models\Media_files;
use App\Models\Albums;
use App\Models\Pagecategory;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Session;
use Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function pages(){
        $pageLiked = [];
        $likepages = Page_like::where('user_id',auth()->user()->id)->get();
        foreach($likepages as $likepage){
            $likepageid = $likepage->page_id;
            array_push($pageLiked,$likepageid);
        }
        $page_data['mypages'] = Page::where('user_id',auth()->user()->id)->orderBy('id','DESC')->limit('5')->get();
        $page_data['suggestedpages'] = Page::whereNotIn('id',$pageLiked)->get();
        $page_data['likedpage'] = Page_like::where('user_id',auth()->user()->id)->orderBy('id','DESC')->limit('10')->get();
        $page_data['view_path'] = 'frontend.pages.pages';
        return view('frontend.index', $page_data);
    }


    public function store(Request $request){
        $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif|nullable',
            'name' => 'required|max:255',
            'category' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }

        if ($request->image && !empty($request->image)) {

            $file_name = FileUploader::upload($request->image,'public/storage/pages/logo', 250);
           
        }

        $page = new Page();
        $page->user_id = auth()->user()->id;
        $page->title = $request->name;
        $page->category_id = $request->category;
        $page->description = $request->description;
        if($request->image && !empty($request->image)){
            $page->logo = $file_name;
        }
        $done = $page->save();
        if($done){
            $pagelike = new Page_like();
            $pagelike->page_id = $page->id;
            $pagelike->user_id = auth()->user()->id;
            $pagelike->role = 'admin';
            $done = $pagelike->save();
            if($done){
                Session::flash('success_message', get_phrase('Page Created Successfully'));
                return json_encode(array('reload' => 1));
            }
        }
        
    }


    public function update(Request $request,$id){
        $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif|nullable',
            'name' => 'required|max:255',
            'category' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
        }

        $page = Page::find($id);
        //previous image name
        $imagename = $page->logo;
        if ($request->image && !empty($request->image)) {
            $file_name = FileUploader::upload($request->image,'public/storage/pages/logo', 250);
        }

        
        $page->user_id = auth()->user()->id;
        $page->title = $request->name;
        $page->category_id = $request->category;
        $page->description = $request->description;
        if($request->image && !empty($request->image)){
            $page->logo = $file_name;
        }
        $done = $page->save();
        if($done){
            // just put the file name and folder name nothing more :) 
            if(!empty($request->image)){
                if (File::exists(public_path('storage/pages/logo/'.$imagename))) {
                    File::delete(public_path('storage/pages/logo/'.$imagename));
                }
            }
        }
        Session::flash('success_message', get_phrase('Page Updated Successfully'));
        return json_encode(array('reload' => 1));
    }


    public function updatecoverphoto(Request $request,$id){
       
        $page = Page::find($id);
        $imagename = $page->coverphoto;

        if ($request->cover_photo && !empty($request->cover_photo)) {
            $file_name = FileUploader::upload($request->image,'public/storage/pages/coverphoto', 1120);

            $page->coverphoto = $file_name;
        }
        $done = $page->save();
        if($done){
            // just put the file name and folder name nothing more :) 
            if(!empty($request->cover_photo)){
                if (File::exists(public_path('storage/pages/coverphoto/'.$imagename))) {
                    File::delete(public_path('storage/pages/coverphoto/'.$imagename));
                }
            }
        }
        Session::flash('success_message', get_phrase('Cover Photo Updated Successfully'));
        return json_encode(array('reload' => 1));

    }


    public function updateinfo(Request $request,$id){
        $page = Page::find($id);
        $page->job = $request->job;
        $page->lifestyle = $request->lifestyle;
        $page->location = $request->location;
        $page->save();
        Session::flash('success_message', get_phrase('Info Updated Successfully'));
        return redirect()->back();
    }


     // load event on scroll 

     public function load_page_by_scrolling(Request $request){

        $mypages =  Page::where('user_id',auth()->user()->id)->skip($request->offset)->take(6)->orderBy('id', 'DESC')->get();
        $page_data['mypages'] = $mypages;
        return view('frontend.pages.single-page', $page_data);
    }


    public function single_page($id){
        $friendsid = [];
        $friendidfind = '';
        $friends = Friendships::where('requester',auth()->user()->id)->orWhere('accepter',auth()->user()->id)->where('is_accepted','1')->get();
        foreach($friends as $friend){
            $friendidfind = $friend->accepter==auth()->user()->id ? "$friend->requester" : "$friend->accepter";
            array_push($friendsid,$friendidfind);
        }

        $all_videos = Media_files::where('page_id', $id)
        ->where('file_type', 'video')
        ->take(20)->orderBy('id', 'DESC')->get();

        $page_data['all_videos'] = $all_videos;

        $all_photos = Media_files::where('page_id', $id)
        ->take(30)->orderBy('id', 'DESC')->get();
        $page_data['all_photos'] = $all_photos;

        $posts =  Posts::where('posts.privacy', '!=', 'private')
                        ->where('posts.publisher', 'page')
                        ->where('posts.publisher_id', $id)
                        ->where('posts.status', 'active')
                        ->join('pages', 'posts.publisher_id', '=', 'pages.id')
                        ->select('posts.*', 'pages.id','pages.title', 'pages.logo', 'posts.created_at as created_at')
                        ->orderBy('posts.post_id', 'DESC')->get();

        $page_data['posts'] = $posts;
        $page_data['suggestedpages'] = Page_like::whereIn('user_id',$friendsid)->where('user_id','!=',auth()->user()->id)->limit('1')->get();
        $page_data['page'] =  Page::find($id);
        $page_data['view_path'] = 'frontend.pages.page-timeline';
        return view('frontend.index', $page_data);
    }



    public function page_photos($id){

        $friendsid = [];
        $friendidfind = '';
        $friends = Friendships::where('requester',auth()->user()->id)->orWhere('accepter',auth()->user()->id)->where('is_accepted','1')->get();
        foreach($friends as $friend){
            $friendidfind = $friend->accepter==auth()->user()->id ? "$friend->requester" : "$friend->accepter";
            array_push($friendsid,$friendidfind);
        }

        
        $all_photos = Media_files::where('page_id', $id)
        ->where('file_type', 'image')
        ->take(20)->orderBy('id', 'DESC')->get();

        $all_albums = Albums::where('page_id', $id)
        ->take(6)->orderBy('id', 'DESC')->get();

        $page_data['all_videos'] = Media_files::where('page_id', $id)
        ->where('file_type', 'video')
        ->take(20)->orderBy('id', 'DESC')->get();

        $page_data['all_photos'] = $all_photos;
        $page_data['all_albums'] = $all_albums;
        $page_data['page'] = Page::find($id);

        $page_data['suggestedpages'] = Page_like::whereIn('user_id',$friendsid)->where('user_id','!=',auth()->user()->id)->limit('1')->get();
        $page_data['view_path'] = 'frontend.pages.photos';
        return view('frontend.index', $page_data);
    }

    public function videos($id){

        $friendsid = [];
        $friendidfind = '';
        $friends = Friendships::where('requester',auth()->user()->id)->orWhere('accepter',auth()->user()->id)->where('is_accepted','1')->get();
        foreach($friends as $friend){
            $friendidfind = $friend->accepter==auth()->user()->id ? "$friend->requester" : "$friend->accepter";
            array_push($friendsid,$friendidfind);
        }

        $all_videos = Media_files::where('page_id', $id)
        ->where('file_type', 'video')
        ->take(20)->orderBy('id', 'DESC')->get();

        $page_data['all_videos'] = $all_videos;
        
        $page_data['page'] = Page::find($id);
        $all_photos = Media_files::where('page_id', $id)
        ->where('file_type', 'image')
        ->take(20)->orderBy('id', 'DESC')->get();
        $page_data['all_photos'] = $all_photos;

        $page_data['suggestedpages'] = Page_like::whereIn('user_id',$friendsid)->where('user_id','!=',auth()->user()->id)->limit('1')->get();
        $page_data['view_path'] = 'frontend.pages.video';
        return view('frontend.index', $page_data);
    }

    function load_videos(Request $request){
        $all_videos = Media_files::where('user_id', $this->user->id)
        ->where('file_type', 'video')
        ->skip($request->offset)->take(12)->orderBy('id', 'DESC')->get();

        $page_data['all_videos'] = $all_videos;
        $page_data['user_info'] = $this->user;
        return view('frontend.profile.video_single', $page_data);
    }


    public function like($id){
        $response = array();
        $pagelike = new Page_like();
        $pagelike->page_id = $id;
        $pagelike->user_id = auth()->user()->id;
        $pagelike->role = 'general';
        $pagelike->save();
        Session::flash('success_message', get_phrase('Page Liked Successfully'));
        $response = array('reload' => 1);
        return json_encode($response);
    }

    public function dislike($id){
        $response = array();
        $pagelike = Page_like::where('page_id',$id)->delete();
        Session::flash('success_message', get_phrase('Page Disliked'));
        $response = array('reload' => 1);
        return json_encode($response);
    }

    


}
