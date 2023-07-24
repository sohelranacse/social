@php $user_info = Auth()->user() @endphp

@include('frontend.story.index')

@include('frontend.main_content.create_post')

<div id="timeline-posts">
    @include('frontend.main_content.posts',['type'=>'user_post'])
</div>

@include('frontend.main_content.scripts')
