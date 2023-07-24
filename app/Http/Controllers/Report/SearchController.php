<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Group;
use App\Models\Marketplace;
use App\Models\Page;
use App\Models\Posts;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // search function
    public function search(){
        $search_param = $_GET['search'];
        $page_data['photos']= Posts::where('description','Like','%'.$search_param.'%')->limit(50)->get();
        $page_data['posts']= Posts::where('description','Like','%'.$search_param.'%')->limit(50)->get();
        $page_data['peoples']= User::where('name','Like','%'.$search_param.'%')->limit(50)->get();
        $page_data['products'] = Marketplace::where('title','like',"%".$search_param."%")->limit(50)->get();
        $page_data['pages'] = Page::where('title','like',"%".$search_param."%")->limit(50)->get();
        $page_data['groups'] = Group::where('title','like',"%".$search_param."%")->where('privacy','public')->limit(50)->get();
        $page_data['events'] = Event::where('title','like',"%".$search_param."%")->where('privacy','public')->limit(50)->get();
        $page_data['videos'] = Video::where('title','like',"%".$search_param."%")->where('privacy','public')->limit(50)->get();
        $page_data['view_path'] = 'frontend.search.searchview';
        return view('frontend.index', $page_data);
    }


    public function search_people(){
        $search_param = $_GET['search'];
        $page_data['peoples']= User::where('name','Like','%'.$search_param.'%')->limit(100)->get(); 
        $page_data['view_path'] = 'frontend.search.people';
        return view('frontend.index', $page_data);
    }

    public function search_post(){
        $search_param = $_GET['search'];
        $page_data['posts']= Posts::where('description','Like','%'.$search_param.'%')->limit(100)->get();
        $page_data['view_path'] = 'frontend.search.post';
        return view('frontend.index', $page_data);
    }

    public function search_video(){
        $search_param = $_GET['search'];
        $page_data['videos'] = Video::where('title','like',"%".$search_param."%")->where('privacy','public')->limit(100)->get();
        $page_data['view_path'] = 'frontend.search.video';
        return view('frontend.index', $page_data);
    }

    public function search_product(){
        $search_param = $_GET['search'];
        $page_data['products'] = Marketplace::where('title','like',"%".$search_param."%")->limit(100)->get();
        $page_data['view_path'] = 'frontend.search.product';
        return view('frontend.index', $page_data);
    }

    public function search_page(){
        $search_param = $_GET['search'];
        $page_data['pages'] = Page::where('title','like',"%".$search_param."%")->limit(100)->get();
        $page_data['view_path'] = 'frontend.search.page';
        return view('frontend.index', $page_data);
    }

    public function search_group(){
        $search_param = $_GET['search'];
        $page_data['groups'] = Group::where('title','like',"%".$search_param."%")->where('privacy','public')->limit(100)->get();
        $page_data['view_path'] = 'frontend.search.group';
        return view('frontend.index', $page_data);
    }

    public function search_event(){
        $search_param = $_GET['search'];
        $page_data['events'] = Event::where('title','like',"%".$search_param."%")->where('privacy','public')->limit(100)->get();
        $page_data['view_path'] = 'frontend.search.event';
        return view('frontend.index', $page_data);
    }
}
