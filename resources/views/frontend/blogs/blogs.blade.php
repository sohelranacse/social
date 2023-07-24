<div class="page-wrap">
    <div class="blog-header mb-3" style="background-image: url('{{ asset('assets/frontend/images/blog-bg.png') }}')">
        <h1 class="h3">{{get_phrase('Blogs')}}</h1>
        <p>{{ get_phrase('Discover new articles') }}</p>
        <div class="btn-inline">
            <a href="{{ route('create.blog') }}" class="btn btn-primary btn-sm"> <i class="fa fa-circle-plus me-2"></i>{{ get_phrase('Create Blog') }}</a>
            <a href="{{ route('myblog') }}" class="btn bg-white btn-sm ms-2">{{ get_phrase('My articles') }}</a>
        </div>
    </div>
    <div class="card blog-tags p-4">
        <div class="tags">
            @foreach ($categories as $category )
                <a href="{{ route('category.blog',$category->id) }}" class="">{{ $category->name }}</a>
            @endforeach 
        </div>
    </div>
    
    <div class="g-3 blog-cards mt-3" >
        <div class="row" id="blogdatashow"> 
            @include('frontend.blogs.blog-single')
        </div>
    </div>
</div> <!-- Page Wrap End -->