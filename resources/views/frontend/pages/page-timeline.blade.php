<div class="profile-wrap">
    @include('frontend.pages.timeline-header')
    <div class="profile-content mt-3">
        <div class="row gx-3">
            <div class="col-lg-7 col-sm-12">
                @include('frontend.pages.inner-nav')
                @if ($page->user_id==auth()->user()->id)
                    @include('frontend.main_content.create_post',['page_id'=>$page->id])
                @endif
                @php
                    $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.is_type', 'page')->where('comments.id_of_type', $page->id)->where('comments.parent_id', 0)->select('comments.*', 'users.name', 'users.photo')->orderBy('comment_id', 'DESC')->take(1)->get();                                                                
                    $total_comments = DB::table('comments')->where('comments.is_type', 'blog')->where('comments.id_of_type', $page->id)->where('comments.parent_id', 0)->get()->count();
                @endphp

                @include('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$page->id,'type'=>"page"])
                
                @include('frontend.main_content.posts',['type'=>"page"])
            </div>
            <div class="col-lg-5 col-sm-12">
                @include('frontend.pages.bio')
            </div>
        </div>
    </div> 
</div>

@include('frontend.main_content.scripts')


    
        