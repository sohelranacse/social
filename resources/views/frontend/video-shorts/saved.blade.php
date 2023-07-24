<div class="page-wrap">
    <div class="d-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><i class="fa-solid fa-file-video"></i></span> {{ get_phrase('Watch') }}</h3>
        <div class="w-80">
            <a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.video-shorts.create'])}}', '{{get_phrase('Create Video & Shorts ')}}');" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="" class="btn btn-primary"> <i
                class="fa-solid fa-clapperboard me-2"></i>{{get_phrase('Create')}}</a>
            <a href="{{ route('videos') }}" class="btn btn-primary"><i class="fa-solid fa-clapperboard me-2"></i>{{get_phrase('Videos')}}</a>
            <a href="{{ route('shorts') }}" class="btn btn-primary"><i class="fa-solid fa-clapperboard me-2"></i>{{get_phrase('Shorts')}}</a>
            <a href="{{ route('save.all.view') }}"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Saved Video"><span><i class="fa-solid fa-bookmark"></i></span></a>
        </div>
    </div>
    
    @foreach ( $videos as $video )
        @if(DB::table('videos')->where('id', $video->video_id)->get()->count() == 0)
            @php  continue; @endphp
        @endif
        <article class="single-entry svideo-entry bg-white p-3">
            <div class="row">
                <div class="col-md-6 col-lg-5 col-sm-12">
                    <div class="entry-thumb">
                        <video class="rounded  w-100 plyr-js" controls="" onplay="pauseOtherVideos(this)"
                            src="{{ asset('storage/videos/'.$video->getVideo->file ) }}"></video> 
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 col-sm-12">
                    <div class="entry-text ms-4">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('video.detail.info',$video->getVideo->id ) }}"><h3 class="h6 mt-4 mt-md-1">{{ $video->getVideo->title }}</h3> </a>
                            <div class="post-controls dropdown dotted mt-4 mt-md-1">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        @php
                                            $saved = \App\Models\Saveforlater::where('video_id',$video->video_id)->where('user_id',auth()->user()->id)->count();
                                        @endphp
                                        @if ($saved>0)
                                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('unsave.video.later',$video->video_id); ?>')" class="dropdown-item btn btn-primary btn-sm"> <img src="{{ asset('assets/frontend/images/save.png') }}" alt=""> {{get_phrase('Unsave Video')}}</a>
                                        @else
                                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('save.video.later',$video->video_id); ?>')" class="dropdown-item btn btn-primary btn-sm"> <img src="{{ asset('assets/frontend/images/save.png') }}" alt=""> {{get_phrase('Save Video')}}</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex my-2">
                            <!-- Avatar -->
                            <div class="avatar">
                                <a href="#!"><img class="avatar-img rounded-circle" src="{{ get_user_image($video->getVideo->getUser->photo,'optimized') }}"
                                        alt="" ></a>
                            </div>
                            <div class="avatar-info ms-2">
                                <h4 class="ava-nave"><a href="#">{{  $video->getVideo->getUser->name  }}</a></h4>
                                <div class="activity-time">{{ date('M d ', strtotime($video->getVideo->created_at)); }} at {{ date('H:i A', strtotime($video->getVideo->created_at)); }}</div>
                            </div>
                        </div>
                        @php
                            $post = \App\Models\Posts::where('publisher','video_and_shorts')->where('publisher_id',$video->video_id)->first();
                            $user_reacts = json_decode($post->user_reacts,true);
                            $user_reacts = count($user_reacts);
                            $comment = \App\Models\Comments::where('id_of_type',$post->id)->count();
                            $view = count(json_decode($video->getVideo->view,true));
                        @endphp
                        <div class="entry-footer">
                            <div class="footer-share pt-3 d-flex justify-content-between w-100">
                                <span class="entry-react post-react"><img src="{{ asset('assets/frontend/images/l-react.png') }}"
                                            alt=""> {{ $user_reacts }}
                                </span>
                                <span class="entry-react">{{ $comment }} {{ get_phrase('Comments') }}</span>
                                <span class="entry-react">{{ $view }} {{ get_phrase('Views') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article> 
    @endforeach

</div>

