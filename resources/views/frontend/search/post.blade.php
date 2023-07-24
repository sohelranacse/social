
    <div class="page-wrap">
        <div class="card search-card p-4">
            <h3 class="sub-title">{{ get_phrase('Search Results') }}</h3>
            @include('frontend.search.header')
        </div> <!-- Search Card End -->
        
        
        <div class="card people-card p-4 mt-4 mb-3">
            <h3 class="sub-title">Posts</h3>
            @include('frontend.main_content.posts',['posts'=>$posts,'type'=>'user_post'])
        </div>
    </div>



    @include('frontend.main_content.scripts')
    @include('frontend.initialize')
    @include('frontend.common_scripts')
