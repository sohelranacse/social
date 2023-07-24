<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Comments;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Image, Session,Share;

class BlogController extends Controller
{
    public function blogs(){
        $page_data['categories'] = Blogcategory::all();
        $page_data['blogs'] = Blog::orderBy('id','DESC')->limit('10')->get();
        $page_data['view_path'] = 'frontend.blogs.blogs';
        return view('frontend.index', $page_data);
    }

    public function myblog(){
        $blogs = Blog::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
        $page_data['blogs'] = $blogs;
        $page_data['view_path'] = 'frontend.blogs.user_blog';
        return view('frontend.index', $page_data);
    }

    public function create(){
        $page_data['blog_category'] = Blogcategory::all();
        $page_data['view_path'] = 'frontend.blogs.create_blog';
        return view('frontend.index', $page_data);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
        ]);

        if ($request->image && !empty($request->image)) {

            $file_name = FileUploader::upload($request->image, 'public/storage/blog/thumbnail', 370);
            FileUploader::upload($request->image, 'public/storage/blog/coverphoto/'.$file_name, 900);
        }

        $blog = new Blog();
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->category_id = $request->category;
        $tags =  json_decode($request->tag,true);
        $tag_array = array();
        if(is_array($tags)){
            foreach($tags as $key => $tag){
                $tag_array[$key]=$tag['value'];
            }
        }
        $blog->tag = json_encode($tag_array);
        $blog->description = $request->description;
        if($request->image && !empty($request->image)){
            $blog->thumbnail = $file_name;
        }
        $blog->view = json_encode(array());
        $blog->save();
        Session::flash('success_message', get_phrase('Blog Created Successfully'));
        return redirect()->route('blogs');
    }


    public function edit($id){
        $page_data['blog_category'] = Blogcategory::all();
        $page_data['blog'] =  Blog::find($id);
        $page_data['view_path'] = 'frontend.blogs.edit_blog';
        return view('frontend.index', $page_data);
    }



    public function update(Request $request,$id){
        
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
        ]);

        if ($request->image && !empty($request->image)) {

            $file_name = FileUploader::upload($request->image, 'public/storage/blog/thumbnail', 370);
            FileUploader::upload($request->image, 'public/storage/blog/coverphoto/'.$file_name, 900);
        }

        $blog = Blog::find($id);

        $blog->user_id = Auth::user()->id;
        // store image name for delete file operation 
        $imagename = $blog->thumbnail;

        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->category_id = $request->category;
        $tags =  json_decode($request->tag,true);
        $tag_array = array();

        if(is_array($tags)){
            foreach($tags as $key => $tag){
                $tag_array[$key]=$tag['value'];
            }
        }
        $blog->tag = json_encode($tag_array);
        $blog->description = $request->description;
        !empty($request->image) ? $blog->thumbnail =  $file_name : $blog->thumbnail;
        $done = $blog->save();
        if ($done) {
            // just put the file name and folder name nothing more :) 
            if(!empty($request->image)){
                removeFile('blog', $imagename);
            }
            Session::flash('success_message', get_phrase('Blog Updated Successfully'));
            return redirect()->route('myblog');
        }
    }





    public function delete(){
        $response = array();
        $blog = Blog::find($_GET['blog_id']);
        // store image name for delete file operation 
        $imagename = $blog->thumbnail;

        $done = $blog->delete();
        if ($done) {
            $response = array('alertMessage' => get_phrase('Blog Deleted Successfully'), 'fadeOutElem' => "#blog-" . $_GET['blog_id']);
            // just put the file name and folder name nothing more :) 
            removeFile('blog', $imagename);
        }
        return json_encode($response);
    }



    public function load_blog_by_scrolling(Request $request){
        $blogs =  Blog::orderBy('id', 'DESC')->skip($request->offset)->take(6)->get();
        $page_data['blogs'] = $blogs;
        return view('frontend.blogs.blog-single', $page_data);
    }



    public function single_blog($id){
        $page_data['comments'] = Comments::where('is_type','blog')->where('id_of_type',$id)->get();
        $page_data['socailshare'] = Share::currentPage()
                            ->facebook()
                            ->twitter()
                            ->linkedin()
                            ->telegram()->getRawLinks();
        $blog = Blog::find($id);
        $blog_view_data = json_decode($blog->view);
        if (!in_array(auth()->user()->id, $blog_view_data)){
            // $blog_view_data == "" ? $blog_view_data = json_encode(array()) : json_encode($blog_view_data);
            array_push($blog_view_data, auth()->user()->id);
            $blog->view =  json_encode($blog_view_data);
            $blog->save();
        }
        $page_data['blog'] = $blog;
        $page_data['categories'] = Blogcategory::all();
        $page_data['recent_posts'] = Blog::orderBy('id','DESC')->limit('5')->get();
        $page_data['view_path'] = 'frontend.blogs.single_blog';
        return view('frontend.index', $page_data);
    }

   


    // category wise page view
    public function category_blog($category){
        $page_data['categories'] = Blogcategory::all();
        $page_data['category_id'] = $category;
        $page_data['blogs'] = Blog::where('category_id',$category)->get();
        $page_data['view_path'] = 'frontend.blogs.category_blog';
        return view('frontend.index', $page_data);
    }




    // blog search 

    public function search(){
        $search = $_GET['search'];
        $output="";
        $posts=Blog::where('title','LIKE','%'.$search."%")->get();
        if($posts){
            foreach ($posts as $key => $post) {
            $output.='<div class="post-entry d-flex">'.
            '<div class="post-thumb"><img class="img-fluid rounded" src=" '. get_blog_image($post->thumbnail,"thumbnail") .' " alt="Recent Post"> </div>'.
            '<div class="post-txt ms-2">'.
            '<h3><a href="'. route("single.blog",$post->id) .'"> '. $post->title .'</a></h3>'.
            '<div class="post-meta">'.
            '<span class="date-meta"><a href="#">'.$post->created_at->format("d-M-Y").'</a></span>'.
            '</div>'.
            '</div>'.
            '</div>';
            }               
            return Response($output);
        }


    }

}
