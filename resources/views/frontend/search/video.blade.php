
    <div class="page-wrap">
        <div class="card search-card p-4">
            <h3 class="sub-title">{{ get_phrase('Search Results') }}</h3>
            @include('frontend.search.header')
        </div> <!-- Search Card End -->
       
        
        <div class="card video-cards p-4 mt-4">
            <h3 class="sub-title mb-4">{{ get_phrase('Videos') }}</h3>
            @foreach ( $videos as $key => $video )
                <article class="single-entry svideo-entry d-flex bg-white p-3">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12">
                            <div class="entry-thumb position-relative">
                                <video class="rounded w-100 saved_video_custom_height"  controls=""
                                    src="{{ asset('storage/videos/'.$video->file ) }}"></video> 
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12">
                            <div class="entry-text ms-4">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('video.detail.info',$video->id ) }}"><h3 class="h6">{{ $video->title }}</h3> </a>
                                </div>
                                <p class="save_video_p_min_height"></p>
                                <div class="d-flex my-2">
                                    <!-- Avatar -->
                                    <div class="avatar">
                                        <a href="#!"><img class="avatar-img rounded-circle w-40 user_image_proifle_height" src="{{ get_user_image($video->getUser->photo,'optimized') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="avatar-info ms-2">
                                        <h4 class="ava-nave"><a href="#">{{  $video->getUser->name  }}</a></h4>
                                        <div class="activity-time">{{ date('M d ', strtotime($video->created_at)); }} at {{ date('H:i A', strtotime($video->created_at)); }}</div>
                                    </div>
                                </div>
                                @php
                                    $post = \App\Models\Posts::where('publisher','video_and_shorts')->where('publisher_id',$video->id)->first();
                                    $user_reacts = json_decode($post->user_reacts,true);
                                    $user_reacts = count($user_reacts);
                                    $comment = \App\Models\Comments::where('id_of_type',$post->id)->count();
                                    $view = count(json_decode($video->view,true));
                                @endphp
                                <div class="entry-footer">
                                    <div class="footer-share pt-3 d-flex justify-content-around w-100">
                                        <span class="entry-react post-react"><a href="#"><img src="{{ asset('assets/frontend/images/l-react.png') }}"
                                                    alt=""> {{ $user_reacts }} </a>
                                        </span>
                                        <span class="entry-react" data-bs-toggle="modal" data-bs-target="#videoChat"><a
                                                href="#">{{ $comment }} {{ get_phrase('Comments') }}</a></span>
                                        <span class="entry-react"><a href="#">{{ $view }} {{ get_phrase('Views') }}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
            
        </div> <!-- Video card End -->
    </div>



    @include('frontend.main_content.scripts')
    @include('frontend.initialize')
    @include('frontend.common_scripts')
