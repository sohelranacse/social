<!-- Modal -->
<form class="ajaxForm" id="createPostForm" action="{{route('create_post')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="post_privacy" name="privacy" value="public">
    <input type="hidden" id="post_type" name="post_type" value="general">
    @isset($event_id)
        <input type="hidden" id="event_id" name="event_id" value="{{ $event_id }}"> 
        <input type="hidden" id="publisher" name="publisher" value="event"> 
    @endisset
    @isset($page_id)
        <input type="hidden" id="page_id" name="page_id" value="{{ $page_id }}"> 
        <input type="hidden" id="publisher" name="publisher" value="page"> 
    @endisset

    @isset($group_id)
        <input type="hidden" id="group_id" name="group_id" value="{{ $group_id }}"> 
        <input type="hidden" id="publisher" name="publisher" value="group"> 
    @endisset

    <div class="modal fade" id="createPost" tabindex="-1" aria-labelledby="createPostLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">{{get_phrase('Create Post')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
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
                                <img src="{{get_user_image($user_info->photo, 'optimized')}}" width="40px" class="rounded-circle" alt="">
                                <h6 class="ms-2 mt-2">{{$user_info->name}}</h6>
                            </a>
                        @endif
                        <div class="entry-status">
                            <div class="dropdown">
                                <button class="btn btn-gray dropdown-toggle" type="button" id="postPrivacyDroupdownBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-earth-americas"></i> {{get_phrase('Public')}}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="postPrivacyDroupdownBtn">
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('private', this, 'postPrivacyDroupdownBtn', 'post_privacy')"><i class="fa-solid fa-user"></i> {{get_phrase('Only Me')}}</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('friends', this, 'postPrivacyDroupdownBtn', 'post_privacy')"><i class="fa-solid fa-users"></i> {{get_phrase('Friends')}}</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('public', this, 'postPrivacyDroupdownBtn', 'post_privacy')"><i class="fa-solid fa-user-group"></i> {{get_phrase('Public')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <textarea name="description" id="post_article" placeholder="{{  get_phrase("What's on your mind ____", [auth()->user()->name]) }}?"></textarea>

                    <div id="tab-file" class="post-inner file-tab cursor-pointer p-0 mt-2">
                        <span class="close-btn z-index-2000"><i class="fa fa-close"></i></span>

                        <!--Uploader start-->
                        <div class="file-uploader">
                            <label for="multiFileUploader">
                                <i class="fa-solid fa-cloud-arrow-up text-secondary"></i>
                                <p>{{get_phrase('Click to browse')}}</p>
                            </label>
                            <input type="file" class="fileUploader position-absolute visibility-hidden" name="multiple_files[]" id="multiFileUploader" accept=".jpg,.jpeg,.png,.gif,.mp4,.mov,.wmv,.avi,.mkv,.webm" multiple/>
                            <div class="preview-files">
                                <div class="row justify-content-start px-3"></div>
                            </div>
                        </div>
                        <!--Uplodaer end-->

                    </div>

                    <div class="post-inner py-3" id="tab-tag">
                        <h4 class="h5"> <a href="javascript:void(0)" onclick="$('#tab-tag').removeClass('current')" class="prev-btn"><i class="fa fa-long-arrow-left"></i></a>{{get_phrase('Tag People')}}
                        </h4>
                        <div class="tag-wrap">
                            
                            <div class="post-tagged">
                                <h4>{{get_phrase('Tagged')}}</h4>
                                <div class="tag-card" id="taggedUsers"></div>
                                <div class="suggesions">
                                    <input class="mt-3" onkeyup="searchFriendsForTagging(this, '#friendsForTagging')" type="search" placeholder="{{get_phrase('Search more peoples')}}">
                                    <h4>{{ get_phrase('Suggestions')}}</h4>

                                    <div class="progress suggestions-loaging-bar d-none"><div class="indeterminate"></div></div>

                                    <div class="tag-peoples" id="friendsForTagging">
                                        @php $friends = DB::table('users')->whereJsonContains('friends', [Auth()->user()->id])->take(5)->get(); @endphp
                                        @include('frontend.main_content.friend_list_for_tagging', array('friends' => $friends))
                                    </div>
                                </div>
                            </div>

                        </div><!-- Tag People End -->
                    </div>

                    @include('frontend.main_content.create_post_felling_and_activity')

                    @include('frontend.main_content.create_post_location')
                    
                    <!-- Location Tab End -->
                    <div class="modal-footer text-center justify-content-center p-3">
                        <button type="button" data-tab="tab-file" class="btn btn-secondary"><img
                                src="{{asset('storage/images/image.svg')}}" alt="photo">{{get_phrase('Photo')}}/{{get_phrase('Video')}}</button>

                        <button type="button" data-tab="tab-tag" class="btn btn-secondary"><img
                                src="{{asset('storage/images/peoples.png')}}" alt="photo">{{get_phrase('Tag People')}}</button>
                        <button type="button" data-tab="tab-feeling" class="btn btn-secondary"><img
                                src="{{asset('storage/images/forum.svg')}}" alt="photo">{{get_phrase('Feelings')}} / {{get_phrase('Activity')}}</button>
                        <button type="button" onclick="loadMaps('map')" data-tab="tab-location" class="btn btn-secondary"><img
                                src="{{asset('storage/images/location.png')}}" alt="photo">{{get_phrase('Location')}}</button>
                        <button type="button" class="btn btn-secondary" onclick="confirmLiveStreaming()"><img src="{{asset('storage/images/camera.svg')}}"
                                alt="photo">{{get_phrase('Live Video')}}</button>
                        <button type="submit" class="btn btn-primary mt-3 rounded w-100 btn-lg">{{get_phrase('Publish')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Create Post Modal End -->
</form>
