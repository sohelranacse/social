<!-- Modal -->
<form class="ajaxForm postEditForm" id="createPostForm{{$post->post_id}}" action="{{route('edit_post', $post->post_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="post_privacy{{$post->post_id}}" name="privacy" value="public">
    

    <div class="">
        <div class="entry-header d-flex justify-content-between">
            @if (isset($page_id)&&!empty($page_id))
                @php
                    $page = \App\Models\Page::find($page_id);
                @endphp
                <a href="{{route('single.page',$page_id)}}" class="author-thumb d-flex align-items-center">
                    <img src="{{get_page_logo($page->logo, 'logo')}}" width="40px" class="rounded-circle" alt="">
                    <h6 class="ms-2 mt-2">{{$page->title}}</h6>
                </a>
            @else
                <a href="{{route('profile')}}" class="author-thumb d-flex align-items-center">
                    <img src="{{get_user_image($post->getUser->photo, 'optimized')}}" width="40px" class="rounded-circle" alt="">
                    <h6 class="ms-2 mt-2">{{$post->getUser->name}}</h6>
                </a>
            @endif
            <div class="entry-status">
                <div class="dropdown">
                    <button class="btn btn-gray dropdown-toggle" type="button" id="postPrivacyDroupdownBtn{{$post->post_id}}" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-earth-americas"></i> {{get_phrase('Public')}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="postPrivacyDroupdownBtn{{$post->post_id}}">
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('private', this, 'postPrivacyDroupdownBtn{{$post->post_id}}', 'post_privacy{{$post->post_id}}')"><i class="fa-solid fa-user"></i> {{get_phrase('Only Me')}}</a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('friends', this, 'postPrivacyDroupdownBtn{{$post->post_id}}', 'post_privacy{{$post->post_id}}')"><i class="fa-solid fa-users"></i> {{get_phrase('Friends')}}</a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('public', this, 'postPrivacyDroupdownBtn{{$post->post_id}}', 'post_privacy{{$post->post_id}}')"><i class="fa-solid fa-user-group"></i> {{get_phrase('Public')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <textarea class="border-n-h-70" name="description" id="post_article{{$post->post_id}}" placeholder="{{  get_phrase("What's on your mind ____", [auth()->user()->name]) }}?">{{$post->description}}</textarea>

        <div class="row g-1">
            @foreach($post->media_files as $media_file)
                @if($media_file->file_type == 'video')
                    <div class="col-auto position-relative" id="previous-uploaded-img-{{$media_file->id}}">
                        <a href="#" onclick="confirmAction('{{route('media.file.delete', $media_file->id)}}', true)" class="post-edit-img-del"><i class="fa-solid fa-trash"></i></a>
                        <picture class="editing-items position-relative">
                            <video height="60px" class="rounded-5px" src="{{get_image('storage/post/videos/'.$media_file->file_name)}}" controls></video>
                        </picture>
                    </div>
                @else
                    <div class="col-auto position-relative" id="previous-uploaded-img-{{$media_file->id}}">
                        <a href="#" onclick="confirmAction('{{route('media.file.delete', $media_file->id)}}', true)" class="post-edit-img-del"><i class="fa-solid fa-trash"></i></a>
                        <picture class="editing-items position-relative">
                            <img height="60px" class="rounded-5px" src="{{get_image('storage/post/images/'.$media_file->file_name)}}">
                        </picture>
                    </div>
                @endif
            @endforeach
        </div>

        <div id="tab-file{{$post->post_id}}" class="post-inner file-tab cursor-pointer p-0 mt-2">
            <span class="close-btn z-index-2000"><i class="fa fa-close"></i></span>

            <!--Uploader start-->
            <div class="file-uploader">
                <label for="multiFileUploader{{$post->post_id}}">
                    <i class="fa-solid fa-cloud-arrow-up text-secondary"></i>
                    <p>{{get_phrase('Click to browse')}}</p>
                </label>
                <input type="file" onchange="chooseFile(this)" class="fileUploader position-absolute visibility-hidden" name="multiple_files[]" id="multiFileUploader{{$post->post_id}}" accept=".jpg,.jpeg,.png,.gif,.mp4,.mov,.wmv,.avi,.mkv,.webm" multiple/>
                <div class="preview-files">
                    <div class="row justify-content-start px-3"></div>
                </div>
            </div>
            <!--Uplodaer end-->

        </div>

        <div class="post-inner py-3" id="tab-tag{{$post->post_id}}">
            <h4 class="h5"> <a href="javascript:void(0)" onclick="$('#tab-tag{{$post->post_id}}').hide()" class="prev-btn"><i class="fa fa-long-arrow-left"></i></a>{{get_phrase('Tag People')}}
            </h4>
            <div class="tag-wrap">
                
                <div class="post-tagged">
                    <h4>{{get_phrase('Tagged')}}</h4>
                    <div class="tag-card" id="taggedUsers{{$post->post_id}}"></div>
                    <div class="suggesions">
                        <input class="mt-3" onkeyup="searchFriendsForTagging(this, '#friendsForTagging')" type="search" placeholder="{{get_phrase('Search more peoples')}}">
                        <h4>{{ get_phrase('Suggestions')}}</h4>

                        <div class="progress suggestions-loaging-bar d-none"><div class="indeterminate"></div></div>

                        <div class="tag-peoples" id="friendsForTagging{{$post->post_id}}">
                            @php $friends = DB::table('users')->whereJsonContains('friends', [Auth()->user()->id])->take(5)->get(); @endphp
                            @include('frontend.main_content.friend_list_for_tagging', array('friends' => $friends))
                        </div>
                    </div>
                </div>

            </div><!-- Tag People End -->
        </div>

        @include('frontend.main_content.edit_post_felling_and_activity')

        @include('frontend.main_content.edit_post_location')
        
        <!-- Location Tab End -->
        <div class="edit-modal-footer text-center p-3">
            <button type="button" data-tab="tab-file{{$post->post_id}}" class="btn btn-secondary status-type-btn"><img
                    src="{{asset('storage/images/image.svg')}}" alt="photo">{{get_phrase('Photo')}}/{{get_phrase('Video')}}</button>

            <button type="button" data-tab="tab-tag{{$post->post_id}}" class="btn btn-secondary status-type-btn"><img
                    src="{{asset('storage/images/peoples.png')}}" alt="photo">{{get_phrase('Tag People')}}</button>
            <button type="button" data-tab="tab-feeling{{$post->post_id}}" class="btn btn-secondary status-type-btn"><img
                    src="{{asset('storage/images/forum.svg')}}" alt="photo">{{get_phrase('Feelings')}} / {{get_phrase('Activity')}}</button>
            <button type="submit" class="btn btn-primary mt-3 rounded w-100 btn-lg">{{get_phrase('Update')}}</button>
        </div>
    </div>
        
</form>


<script type="text/javascript">
    "Use strict";

    $(function(){
        var ecta = $(".edit-modal-footer .btn:not([type=submit])");
        ecta.click(function(){
            var tab_id = $(this).attr('data-tab');
            $('.postEditForm .post-inner').hide();
            $("#"+tab_id).show();
        })

        $(".postEditForm .post-inner span.close-btn").on("click", function() {
            $(".postEditForm .post-inner").hide();
        })
    });
</script>

<!-- <script src="{{asset('assets/frontend/uploader/file-uploader.js')}}"></script> -->
@include('frontend.initialize')
