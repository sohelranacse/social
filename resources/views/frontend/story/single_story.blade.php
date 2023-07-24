@foreach ($stories as $story)
    <a href="javascript:void(0)" class="story-entry creat-story m-0" onclick="loadStoryDetailsOnModal('<?php echo $story->story_id; ?>')">
        <div class="story-small-img">
            <img src="{{get_user_image($story->photo, 'optimized')}}" alt="photo">
        </div>

        @if($story->content_type == 'text')
            @php
                $text_info = json_decode($story->description, true);
            @endphp
            <div class="stories-view" style="color: <?php echo '#'.$text_info['color']; ?>; background-color: <?php echo '#'.$text_info['bg-color']; ?>;">
                {{$text_info['text']}}
            </div> 
        @else
            @php $media_files = DB::table('media_files')->where('story_id', $story->story_id)->get(); @endphp
            @foreach($media_files as $media_file)
                @if($media_file->file_type == 'video')
                    @if(File::exists('storage/story/videos/'.$media_file->file_name))
                        <video muted controlsList="nodownload" class="plyr-js initialized">
                            <source src="{{asset('storage/story/videos/'.$media_file->file_name)}}" type="">
                        </video>
                    @endif
                @else
                    <figure class="avatar-img rounded" style="background-image: url({{asset('storage/story/images/'.$media_file->file_name)}})"></figure>
                @endif
            @endforeach
        @endif

        <div class="story-shadow">
            <div class="story-text">
                <h4 class="text-nav">{{$story->name}}</h4>
                <p class="text-des">{{date_formatter($story->created_at, 2)}}</p>
            </div>
        </div>
    </a><div class="devider"></div>
@endforeach