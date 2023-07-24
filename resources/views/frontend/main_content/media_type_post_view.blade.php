<div class="row" id="postMediaSection{{ $post->post_id }}">
    <div class="col-12">
        @php $media_files = DB::table('media_files')->where('post_id', $post->post_id)->get(); @endphp
        @php $media_files_count = count($media_files); @endphp
        <div class="photoGallery visibility-hidden @if($media_files_count == 1) initialized @endif">
                <!-- break after loaded 5 images -->
                @php $more_unloaded_images = $media_files_count - 5; @endphp
                @foreach($media_files as $key => $media_file)

                    @php if($key == 5) break; @endphp

                    @if($media_file->file_type == 'video')
                        @if(File::exists('public/storage/post/videos/'.$media_file->file_name))
                            @if($media_files_count > 1)
                                <a class="position-relative" onclick="showCustomModal('{{route('preview_post', ['post_id' => $post->post_id, 'file_name' => $media_file->file_name])}}', '{{get_phrase('Preview')}}', 'xxl')" href="javascript:void(0)">
                            @endif

                                <video muted controlsList="nodownload" class="plyr-js w-100 rounded video-thumb @if($media_files_count > 1) initialized @endif" onplay="pauseOtherVideos(this)">
                                    <source src="{{get_post_video($media_file->file_name)}}" type="">
                                </video>

                                @if($more_unloaded_images > 0 && $key == 4)
                                    <div class="more_image_overlap"><span><i class="fa-solid fa-plus"></i> {{$more_unloaded_images}}</span></div>
                                @endif

                            @if($media_files_count > 1)
                                </a>
                            @endif
                        @endif
                    @else
                        <div class="picture text-center"> 
                            <a onclick="showCustomModal('{{route('preview_post', ['post_id' => $post->post_id, 'file_name' => $media_file->file_name])}}', '{{get_phrase('Preview')}}', 'xxl')" href="javascript:void(0)">

                                @if($more_unloaded_images > 0 && $key == 4)
                                    @php $opacity = 'opacity-7'; @endphp
                                    <div class="more_image_overlap"><span><i class="fa-solid fa-plus"></i> {{$more_unloaded_images}}</span></div>
                                @else
                                    @php $opacity = ''; @endphp
                                @endif

                                <img src="{{get_post_image($media_file->file_name)}}" class="w-100 h-100 @if($media_files_count == 1) single-image-ration @endif {{ $opacity }}" alt="">
                            </a>
                        </div>
                    @endif

                @endforeach
            </div>
    </div>
</div>