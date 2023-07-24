@foreach ($blogs as $blog )
    <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-4 my-1 single-item-countable" id="blog-{{ $blog->id }}">
        <article class="single-entry">
            <a href="{{ route('single.blog',$blog->id) }}">
                <div class="entry-img thumbnail-210-200" style="background-image: url('{{ get_blog_image($blog->thumbnail,'thumbnail') }}')">
                    <span class="date-meta">{{ $blog->created_at->timezone(Auth::user()->timezone)->format("d-M-Y") }}</span>
                </div>
            </a>
            <div class="entry-txt min-hight-125px">
                <div class="blog-meta">
                    <span><a href="{{ route('single.blog',$blog->id) }}">{{ $blog->cagtegory->name }}</a></span>
                </div>
                <h3 class="h6 ellipsis-line-2"><a href="{{ route('single.blog',$blog->id) }}">{{$blog->title}}</a></h3>
                <div class="d-flex blog-ava">
                    <img src="{{ get_user_image($blog->user_id,'optimized') }}" class="user-round" alt="">
                    <div class="ava-info">
                        <h6><a href="{{ route('user.profile.view',$blog->getUser->id) }}">{{ $blog->getUser->name }} </a></h6>
                        <small>{{ $blog->created_at->timezone(Auth::user()->timezone)->diffForHumans()  }} </small>
                    </div>
                </div>
            </div>
        </article>
    </div> 
@endforeach