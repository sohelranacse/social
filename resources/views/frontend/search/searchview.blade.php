
    <div class="page-wrap">
        <div class="card search-card p-4">
            <h3 class="sub-title">{{ get_phrase('Search Results') }}</h3>
            @include('frontend.search.header')
        </div> <!-- Search Card End -->
        <div class="card page-card p-4 mt-4">
            <h3 class="sub-title">{{ get_phrase('Pages') }}</h3>
            <div class="suggest-wrap row g-2 my-3">
                @foreach ($pages as $key => $mypage )
                    <div class="col-lg-4 col-xl-3 col-md-4 col-6">
                        <div class="card sugg-card p-2 rounded">
                            <a href="{{ route('single.page',$mypage->id) }}" class="mb-2 thumbnail-110-auto" style="background-image: url('{{ get_page_logo($mypage->logo, 'logo') }}')"></a>
                            <h4><a href="{{ route('single.page',$mypage->id) }}">{{ ellipsis($mypage->title,10) }}</a></h4>
                            @php
                                    $likecount = \App\Models\Page_like::where('page_id',$mypage->id)->where('user_id',auth()->user()->id)->count();
                            @endphp
                            <span class="small text-muted">{{ $likecount }} {{ get_phrase('likes') }}</span>
                            @if ($likecount>0)
                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$mypage->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i>{{ get_phrase('Liked') }}</a>
                            @else
                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$mypage->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i>{{ get_phrase('Like') }}</a>
                            @endif
                        </div><!--  Card End -->
                    </div>
                @endforeach
            </div> 
            @if (count($pages)>4)
                <a href="{{ url('search/page?search='.$_GET['search']) }}" class="btn btn-secondary btn-sm mt-3">{{ get_phrase('See More') }}</a>
            @endif
        </div> <!-- Search Card End -->
        <div class="card people-card p-4 mt-4 mb-3">
            <h3 class="sub-title">{{ get_phrase('People') }}</h3>
            @foreach ($peoples as $key=> $people)
            @php
                if($people->id==auth()->user()->id){
                    continue;
                }
            @endphp
            <div class="people-wrap mt-2">
                <div class="people-item d-sm-flex mb-3 justify-content-between w-100">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar">
                            <a href="{{ route('user.profile.view',$people->id) }}"><img class="avatar-img rounded-circle user_image_show_on_modal" src="{{ get_user_image($people->photo,'optimized') }}" alt=""
                                    ></a>
                        </div>
                        <div class="avatar-info ms-2">
                            <h6 class="mb-1"><a href="{{ route('user.profile.view',$people->id) }}">{{ $people->name }}</a></h6>
                            <div class="activity-time small-text text-muted">{{ ellipsis($people->about,'30') }}
                            </div>
                        </div>
                    </div>
                    
                    @php
                        $user_id = $people->id;
                        $friend = \App\Models\Friendships::where(function($query) use ($user_id){
                            $query->where('requester', auth()->user()->id);
                            $query->where('accepter', $user_id);
                        })
                        ->orWhere(function($query) use ($user_id) {
                            $query->where('accepter', auth()->user()->id);
                            $query->where('requester', $user_id);
                        })
                        ->count();

                        $friendAccepted = \App\Models\Friendships::where(function($query) use ($user_id){
                            $query->where('requester', auth()->user()->id);
                            $query->where('accepter', $user_id);
                            $query->where('is_accepted',1);
                        })
                        ->orWhere(function($query) use ($user_id) {
                            $query->where('accepter', auth()->user()->id);
                            $query->where('requester', $user_id);
                            $query->where('is_accepted',1);
                        })
                        ->count();

                        
                    @endphp
                    
                    

                    @if ($friend>0)
                        @if ($friendAccepted>0)
                            <a href="#" class="btn btn-secondary align-self-start"><i class="fa-solid fa-user-group"></i> {{ get_phrase('Friend') }} </a>
                        @else
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.unfriend',$people->id); ?>')" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancle Friend Request" class="btn btn-primary align-self-start"><i class="fa-solid fa-xmark"></i> {{ get_phrase('Cancel') }}</a>
                        @endif
                    @else   
                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.friend',$people->id); ?>')" class="btn btn-primary align-self-start mt-2"><i class="fa-solid fa-plus"></i> {{ get_phrase('Add Friend') }} </a>
                    @endif

                    
                </div>
            </div>
                @if ($key > 2)
                    @break 
                @endif
            @endforeach
            @if (count($peoples)>4)
                <a href="{{ url('search/people?search='.$_GET['search']) }}" class="btn btn-secondary btn-sm mt-3 ">{{ get_phrase('See More') }}</a>
            @endif
        </div> <!-- Add Friend Card End -->
        <div class="card people-card p-4 mt-4 mb-3">
            <h3 class="sub-title">{{ get_phrase('Posts') }}</h3>
            @include('frontend.main_content.posts',['posts'=>$posts,'search'=>'search','type'=>'user_post'])
            @if (count($posts)>2)
                <a href="{{ url('search/post?search='.$_GET['search']) }}" class="btn btn-secondary btn-sm mt-3 ">{{ get_phrase('See More') }}</a>
            @endif
        </div>


        <div class="card p-3 mt-4">
            <h3 class="sub-title">{{ get_phrase('Marketplace') }}</h3>
            <div class="row">
                @include('frontend.marketplace.product-single',['products'=>$products,'search'=>'search'])
            </div>
            @if (count($products)>3)
                <a href="{{ url('search/product?search='.$_GET['search']) }}" class="btn btn-secondary d-block mt-3 btn-sm">{{ get_phrase('See More') }}</a>
            @endif
        </div> <!-- Marketplace card End -->
        <div class="card video-cards p-4 mt-4">
            <h3 class="sub-title mb-4">{{ get_phrase('Videos') }}</h3>
            @foreach ( $videos as $key => $video )
                <article class="single-entry svideo-entry d-flex bg-white p-3">
                    <div class="row w-100">
                        <div class="col-md-5 col-lg-5 col-sm-12">
                            <div class="entry-thumb position-relative">
                                <video class="rounded w-100 saved_video_custom_height"  controls=""
                                    src="{{ asset('storage/videos/'.$video->file ) }}"></video> 
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12">
                            <div class="entry-text ms-4 pt-3">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('video.detail.info',$video->id ) }}"><h3 class="h6">{{ $video->title }}</h3> </a>
                                </div>
                                <p class="save_video_p_min_height"></p>
                                <div class="d-flex my-2">
                                    <!-- Avatar -->
                                    <div class="avatar">
                                        <a href="#!"><img class="avatar-img rounded-circle w-40 user_image_proifle_height" src="{{ get_user_image($video->getUser->photo,'optimized') }}"
                                                alt="" ></a>
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
                                    <div class="footer-share pt-3 d-flex justify-content-between w-100">
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
                @if ($key==2)
                    @break
                @endif 
            @endforeach
            @if (count($videos)>3)
                <a href="{{ url('search/video?search='.$_GET['search']) }}" class="btn btn-secondary d-block mt-3 btn-sm">{{ get_phrase('See More') }}</a>
            @endif
        </div> <!-- Video card End -->
        <div class="card p-4 mt-4">
            <h3 class="sub-title">{{ get_phrase('Groups') }}</h3>
            <div class="suggest-wrap row g-2">
                @foreach ($groups as $key => $group )
                <div class="col-md-3 col-lg-4 col-xl-3 col-6">
                    <div class="card sugg-card p-2 rounded">
                        <div class="mb-2 thumbnail-103-103" style="background-image: url('{{ get_group_logo($group->logo,'logo') }}');"></div>
                                    <a href="{{ route('single.group',$group->id) }}"><h4>{{ ellipsis($group->title,10) }}</h4></a>
                        @php $joined = \App\Models\Group_member::where('group_id',$group->id)->where('is_accepted','1')->count(); @endphp
                        <span class="small text-muted">{{ $joined }} {{ get_phrase('Member') }} @if($joined>1) s @endif</span>
                        @php $join = \App\Models\Group_member::where('group_id',$group->id)->where('user_id',auth()->user()->id)->count(); @endphp
                        @if ($join>0)
                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->id); ?>')" class="btn btn-primary">{{ get_phrase('Joined') }}</a>
                        @else
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.join',$group->id); ?>')" class="btn btn-primary">{{ get_phrase('Join') }}</a>
                        @endif
                    </div>
                </div>
                    @if ($key==3)
                        @break
                    @endif
                @endforeach
            </div>
            @if (count($groups)>3)
                <a href="{{ url('search/group?search='.$_GET['search']) }}" class="btn btn-secondary btn-sm mt-3">{{ get_phrase('See More') }}</a>
            @endif
        </div><!--  Group Card End -->
       
        <div class="event-card p-3 card mt-3">
            <h3 class="sub-title mb-3">{{ get_phrase('Events') }}</h3>
            <div class="row">
                @include('frontend.events.event-single',['events'=>$events,'search'=>'search'])
            </div>
            @if (count($events)>3)
                <a href="{{ url('search/event?search='.$_GET['search']) }}" class="btn btn-sm btn-secondary d-block">{{ get_phrase('More Events') }}</a>
            @endif
        </div> <!-- Event Cards End -->
        
        
    </div>



    @include('frontend.main_content.scripts')
    @include('frontend.initialize')
    @include('frontend.common_scripts')
