@foreach($media_files as $media_file)
    @if($media_file->file_type == 'video')
        <div class="single-item-countable col">
            <a href="{{ route('single.post',$media_file->post_id) }}">
                <video muted controlsList="nodownload" class="img-thumbnail w-100 user_info_custom_height">
                    <source src="{{get_post_video($media_file->file_name)}}" type="">
                </video>
            </a>
        </div>
    @else
        <div class="single-item-countable col">
            <a href="{{ route('single.post',$media_file->post_id) }}">
                <img class="img-thumbnail w-100 user_info_custom_height" src="{{get_post_image($media_file->file_name, 'optimized')}}">
            </a>
        </div>
    @endif
@endforeach