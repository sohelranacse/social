@php
    $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.is_type', 'blog')->where('comments.id_of_type', $blog->id)->where('comments.parent_id', 0)->select('comments.*', 'users.name', 'users.photo')->orderBy('comment_id', 'DESC')->take(1)->get();                                                                
    $total_comments = DB::table('comments')->where('comments.is_type', 'blog')->where('comments.id_of_type', $blog->id)->where('comments.parent_id', 0)->get()->count();
@endphp

<div class="single-wrap">
    <div class="blog-feature" style="background-image: url('{{ get_blog_image($blog->thumbnail,'coverphoto') }}')">
        <div class="blog-head">
            <a href="#" class="btn btn-primary"> {{ $blog->created_at->format("d-M-Y") }} </a>
            <h1>{{ $blog->title }}</h1>

            <div class="d-flex align-items-center">
                <img src="{{ get_user_image($blog->user_id,'optimized') }}" class="user-round user_image_show_on_modal" alt="">
                <div class="ava-info ms-2">
                    <h6 class="mb-0"><a href="{{ route('user.profile.view',$blog->getUser->id) }}">{{ $blog->getUser->name }}</a></h6>
                    <small>{{ $blog->created_at->diffForHumans()  }}</small>
                </div>
            </div>
            <div class="bhead-meta">
                <span>{{ $total_comments }} {{ get_phrase('Comments') }}</span>
                <span>{{ count(json_decode($blog->view)) }} {{ get_phrase('Views') }}</span>
            </div>
        </div>
    </div><!--  Blog Cover End -->
    <div class="row g-2 mt-3 ">
        <div class="col-lg-7">
            <div class="card p-3 blog-details">
                @php echo script_checker($blog->description, false); @endphp
                <div class="blog-footer">
                    <div class="post-share justify-content-between align-items-center border-bottom pb-3">
                        <div class="post-meta">
                            @php
                                $tags = json_decode($blog->tag, true);
                            @endphp
                            
                            @if(is_array($tags))
                                @foreach ($tags as $tag )
                                    <a href="#"><span class="badge bg-primary mt-1">#{{ $tag }}</span></a>
                                @endforeach
                            @endif
                        </div>
                        <div class="p-share d-flex align-items-center mt-3">
                            <h3 class="h6">{{ get_phrase('Share') }}: </h3>
                            <div class="social-share ms-2">
                                <ul>
                                    @foreach ($socailshare as $key => $value )
                                        <li><a href="{{ $value }}" target="_blank"><i class="fa-brands fa-{{ $key }}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comment Start -->
                        <div class="user-comments  bg-white" id="user-comments-{{$blog->id}}">
                            <div class="comment-form d-flex p-3 bg-secondary">
                                <img src="{{get_user_image(Auth()->user()->photo, 'optimized')}}" alt="" class="rounded-circle img-fluid" width="40px">
                                <form action="javascript:void(0)" class="w-100 ms-2" method="post">
                                    <input class="form-control py-3" onkeypress="postComment(this, 0, {{$blog->id}}, 0,'blog');" rows="1" placeholder="Write Comments">
                                </form>
                            </div>
                            <ul class="comment-wrap pt-3 pb-0 list-unstyled" id="comments{{$blog->id}}">
                                @include('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$blog->id,'type'=>"blog"])
                            </ul>
                            @if($comments->count() < $total_comments) 
                                <a class="btn p-3 pt-0" onclick="loadMoreComments(this, {{$blog->id}}, 0, {{$total_comments}},'blog')">{{get_phrase('View Comment')}}</a>
                            @endif
                        </div>
                    
                </div><!--  Blog Details Footer End -->
            </div>
        </div>
        <div class="col-lg-5">
            <aside class="sidebar">
                <div class="widget search-widget">
                    <form action="#" class="search-form">
                        <input class="bg-secondary" type="search" id="searchblogfield" placeholder="Search">
                        <span><i class="fa fa-search"></i></span>
                    </form>
                </div>
                <div class="widget recent-posts">
                    <h3 class="widget-title mb-4">{{ get_phrase('Recent Post') }}</h3>
                    <div class="posts-wrap" id="searchblogviewsection">
                        @foreach ($recent_posts as $post )
                            <div class="post-entry d-flex">
                                <div class="post-thumb"><img class="img-fluid rounded" src="{{ get_blog_image($post->thumbnail,'thumbnail') }}" alt="Recent Post">
                                </div>
                                <div class="post-txt ms-2">
                                    <h3><a class="ellipsis-line-2" href="{{ route('single.blog',$post->id) }}">{{ $post->title }}</a></h3>
                                    <div class="post-meta">
                                        <span class="date-meta"><a href="#">{{ $post->created_at->format("d-M-Y") }}</a></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> <!-- Recent Post Widget End -->
                <div class="widget tag-widget">
                    <h3 class="widget-title mb-3">{{ get_phrase('Categories') }}</h3>
                    <div class="tags">
                        @foreach ($categories as $category )
                            <a href="{{ route('category.blog',$category->id) }}" class="@if($post->category_id == $category->id) active @endif">{{ $category->name }} ({{DB::table('blogs')->where('category_id', $category->id)->get()->count()}})</a>
                        @endforeach                         
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div><!-- Single Page Wrap End -->
@include('frontend.main_content.scripts')
@include('frontend.initialize')


