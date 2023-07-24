<div class="row">
    <div class="col-12 text-center">
        <span class="live-icon">
            <i class="fa fa-dot-circle"></i>
            {{ get_phrase('LIVE')}}
        </span>
        <img class="live-image my-4" src="{{asset('storage/images/live.png')}}">
    </div>
    <div class="col-12 text-center pt-5">

        @if(is_array($live_description) && $live_description['live_video_ended'] == 'yes')
            <a class="live-watch-now mt-3 btn-disabled" href="#"> {{get_phrase('Live video is ended')}}</a>
        @else
            <a class="live-watch-now mt-3" href="{{route('live', ['post_id' => $post->post_id])}}"><i class="fa fa-video"></i> {{get_phrase('Join now')}}</a>
        @endif
    </div>
</div>