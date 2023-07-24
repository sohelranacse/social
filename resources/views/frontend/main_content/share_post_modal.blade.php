<div class="social-share">
    <ul class="site-share text-center my-3">
        @foreach (Share::currentPage()->facebook()->twitter()->linkedin()->telegram()->getRawLinks(); as $key => $value )
            <li><a href="{{ $value }}" target="_blank" class="only_for_share_page"><i class="fa-brands fa-{{ $key }}"></i></a></li>
        @endforeach
    </ul>
</div>
<div class="footer-modal-share">
    <h4 class="h6 fw-6 mb-3"> {{ get_phrase('Share the post on') }}</h4>
    <div class="inner-share d-flex" id="myTab" role="tablist">
        <button class="btn btn-secondary btn-sm px-3" id="timelinePostBtn"><img
                src="{{asset('storage/images/timeline.png')}}" alt="photo"> {{ get_phrase('My Timeline') }}</button>

        <button class="btn btn-secondary btn-sm px-3 mx-2" id="messageSendButton"><img
                src="{{asset('storage/images/Message.png')}}" alt="photo"> {{ get_phrase('Send in Message') }}</button>
        <button class="btn btn-secondary btn-sm px-3" id="groupPostButton"><img
                src="{{asset('storage/images/story.png')}}" alt="photo"> {{ get_phrase('Share to a Group') }}
        </button>
    </div>
        <div class="time-line-area d-none" id="timeline-content-area">
            <input type="hidden" name="istimeline" value="1">
        </div>
        <div class="message-area mt-3 d-none" id="message-content-area">
            <h5 class="my-3">{{ get_phrase('Friends')}}</h5>
            @include('frontend.main_content.my_friend_list')
        </div>
        <div class="group-area mt-3 d-none" id="group-content-area">
            <h5 class="my-3">{{ get_phrase('Groups')}}</h5>
            @include('frontend.main_content.my_group_list')
        </div>
    <form class="ajaxForm" action="{{ route('share.my.timeline') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($post_id)&&!empty($post_id))
                <input type="hidden" name="postUrl" value="{{ route('single.post',$post_id) }}">
                <input type="hidden" name="shared_post_id" value="{{$post_id }}">
            @endif
            @if(isset($product_id)&&!empty($product_id))
                <input type="hidden" name="productUrl" value="{{ route('single.product.iframe',$product_id) }}">
                <input type="hidden" name="shared_product_id" value="{{$product_id }}">
            @endif
        <button type="submit" class="btn btn-primary mt-3 rounded w-100 btn-lg" id="ShareButton">{{ get_phrase('Share')}}</button>
    </form>
</div>

@include('frontend.main_content.scripts')
@include('frontend.initialize')
@include('frontend.common_scripts')

