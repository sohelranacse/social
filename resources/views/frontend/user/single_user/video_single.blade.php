@foreach($all_videos as $video)
    <div class="single-item-countable single-photo">
        <video muted controlsList="nodownload" controls class=" w-100" src="{{get_post_video($video->file_name)}}"></video>
        
    </div>
@endforeach
