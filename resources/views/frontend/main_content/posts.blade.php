
@foreach($posts as $loopIndex => $post)
    @php
        $total_comment_main_comments = DB::table('comments')->where('comments.is_type', 'post')->where('comments.id_of_type', $post->post_id)->where('comments.parent_id', 0)->get()->count();
        $total_comment_sub_comments = DB::table('comments')->where('comments.is_type', 'post')->where('comments.id_of_type', $post->post_id)->where('comments.parent_id',">", 0)->get()->count();
        $total_comments = $total_comment_main_comments + $total_comment_sub_comments;


        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.is_type', 'post')
            ->where('comments.id_of_type', $post->post_id)
            ->where('comments.parent_id', 0)
            ->select('comments.*', 'users.name', 'users.photo')
            ->orderBy('comment_id', 'DESC')->take(1)->get();

        
        $tagged_user_ids = json_decode($post->tagged_user_ids);
        
    @endphp
    @php $user_reacts = json_decode($post->user_reacts, true); @endphp

    <div class="single-item-countable single-entry" id="postIdentification{{ $post->post_id }}">
        <div class="entry-inner">
            <div class="entry-header d-flex justify-content-between">
                <div class="ava-info d-flex align-items-center">
                    @if (isset($type)&&$type=="page")
                        <div class="flex-shrink-0">
                            <img src="{{get_page_logo($post->logo, 'logo')}}" class="rounded-circle user_image_show_on_modal" alt="...">
                        </div>  
                    @elseif (isset($type)&&$type=="group")
                        <div class="flex-shrink-0">
                            <img src="{{get_user_image($post->photo, 'optimized')}}" class="rounded-circle user_image_show_on_modal" alt="...">
                        </div>
                    @elseif (isset($type)&&$type=="video")
                        <div class="entry-header d-flex justify-content-between">
                            <div class="ava-info d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ get_user_image($post->photo,'optimized') }}" class="rounded rounded-circle user_image_show_on_modal" alt="...">
                                
                                </div>
                                <div class="ava-desc ms-2">
                                    <h3 class="mb-0">{{ $post->name }}</h3>
                                    <small class="meta-time text-muted">{{ date('M d ', strtotime($post->created_at)); }} at {{ date('H:i A', strtotime($post->created_at)); }}</small>
                                    @if ($post->privacy=='public')
                                        <span class="meta-privacy text-muted"><i
                                            class="fa-solid fa-earth-americas"></i></span>
                                    @endif
                                </div>
                            </div>
                            <div class="post-controls dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/frontend/images/save.png') }}" alt="">
                                            {{ get_phrase('Save Video') }}</a></li>
                                    <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/frontend/images/link.png') }}" alt="">{{ get_phrase('Copy Link') }}</a></li>
                                    <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/frontend/images/report.png') }}"
                                                alt="">{{ get_phrase('Report') }} </a></li>
                                </ul>
                            </div>
                        </div>
                    @elseif (isset($type)&&$type=="user_post")
                    <div class="flex-shrink-0">
                        <img src="{{get_user_image($post->user_id, 'optimized')}}" class="rounded-circle user_image_show_on_modal" alt="...">
                    </div>
                    @else
                        <div class="flex-shrink-0">
                            <img src="{{get_user_image($post->id, 'optimized')}}" class="rounded-circle user_image_show_on_modal" alt="...">
                        </div>
                    @endif
                    <div class="ava-desc ms-2">
                        <h3 class="mb-0">
                            @if (isset($type)&&$type=="page")
                                <a class="text-black" href="{{route('single.page',$post->id)}}">{{$post->title}}</a>
                            @elseif (isset($type)&&$type=="group")
                                <a class="text-black" href="{{ route('user.profile.view',$post->user_id) }}">{{$post->name}}</a>
                            @else
                                <a class="text-black" href="{{ route('user.profile.view',$post->user_id) }}">{{$post->getUser->name}}
                                    @if ($post->user_id != auth()->user()->id)
                                        @php
                                            $follow = \App\Models\Follower::where('user_id',$post->user_id)->where('follow_id',$post->user_id)->count();
                                        @endphp
                                        @if ($follow>0)
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.unfollow',$post->user_id); ?>')">{{ get_phrase('Unfollow') }}</a> 
                                        @else
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.follow',$post->user_id); ?>')">{{ get_phrase('Follow') }}</a> 
                                        @endif
                                    @endif
                                </a>
                            @endif
                            <!-- Check tagged users -->

                            @if($post->post_type == 'cover_photo')
                                <small class="text-muted">{{get_phrase('has changed cover photo')}}</small>
                            @endif

                            @if($post->post_type == 'share')
                                <small class="text-muted">{{get_phrase('shared post')}}</small>
                            @endif

                            @if($post->post_type == 'live_streaming')
                                @php
                                    $live_description = json_decode($post->description, true);
                                @endphp
                                @if(is_array($live_description) && $live_description['live_video_ended'] == 'yes')
                                    <small class="text-muted">{{get_phrase('was on live ____', [date_formatter($post->created_at, 3)])}}</small>
                                @else
                                    <small class="text-muted">{{get_phrase('is live now')}}</small>
                                @endif
                            @endif

                            @if(count($tagged_user_ids) > 0 || $post->activity_id > 0)
                                <small class="text-muted">-</small>

                                <!-- Feeling and activity -->
                                @if($post->activity_id > 0)
                                    @php
                                        $feeling_and_activities = DB::table('feeling_and_activities')->where('feeling_and_activity_id', $post->activity_id)->first();
                                    @endphp
                                    @if($feeling_and_activities->type == 'activity')
                                        {{$feeling_and_activities->title}}
                                    @else
                                        <spam class="text-muted">{{get_phrase('feeling')}}</spam>
                                        <b> {{$feeling_and_activities->title}} </b>
                                    @endif
                                @endif

                                @if(count($tagged_user_ids) > 0)
                                    <small class="text-muted">{{get_phrase('with')}}</small>
                                    @foreach($tagged_user_ids as $key => $tagged_user_id)
                                        <small class="text-muted">@php if($key > 0)echo','; @endphp</small>
                                        <a class="text-black" href="{{route('profile')}}">{{DB::table('users')->where('id', $tagged_user_id)->value('name')}}</a>
                                    @endforeach

                                @endif
                            @endif

                            @if(!empty($post->location))
                                <small class="text-muted">{{get_phrase('in')}}</small> <a href="https://www.google.com/maps/place/{{$post->location}}" target="_blanck">{{$post->location}}</a>
                            @endif
                        </h3>
                        <small class="meta-time text-muted">{{date_formatter($post->created_at, 2)}}</small>

                        @if($post->privacy == 'public')
                            <span class="meta-privacy text-muted" title="{{ucfirst(get_phrase($post->privacy))}}"><i class="fa-solid fa-earth-americas"></i></span>
                        @elseif($post->privacy == 'private')
                            <span class="meta-privacy text-muted" title="{{ucfirst(get_phrase($post->privacy))}}"><i class="fa-solid fa-user"></i></span>
                        @else
                            <span class="meta-privacy text-muted" title="{{ucfirst(get_phrase($post->privacy))}}"><i class="fa-solid fa-users"></i></span>
                        @endif
                    </div>
                </div>
                <div class="post-controls dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <input type="hidden"  id="copy_post_{{ $post->post_id }}" value="{{ route('single.post',$post->post_id) }}" >
                        <li><a class="dropdown-item" href="javascript:void(0)" value="copy" onclick="copyToClipboard('copy_post_{{ $post->post_id }}')" ><img src="{{asset('storage/images/link.png')}}" alt="">{{get_phrase('Copy Link')}}</a></li>
                        @if($post->user_id == auth()->user()->id)
                            @if($post->post_type != 'live_streaming' && $post->location == '')
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="showCustomModal('<?php echo route('edit_post_form', $post->post_id); ?>', '{{get_phrase('Edit post')}}', 'lg')" > <i class="fa-solid fa-pencil"></i> {{get_phrase('Edit')}}</a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="confirmAction('<?php echo route('post.delete', ['post_id' => $post->post_id]); ?>', true)" > <i class="fa-solid fa-trash-can"></i> {{get_phrase('Delete')}}</a>
                            </li> 
                        @endif
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.main_content.create_report','post_id'=>$post->post_id])}}', '{{get_phrase('Report Post')}}');" data-bs-toggle="modal"
                            data-bs-target="#createEvent"><img src="{{asset('storage/images/report.png')}}" alt="">{{get_phrase('Report')}}
                                </a></li>  
                    </ul>
                </div> 
            </div>

            <!-- START POST VIEW -->
            <div class="entry-content pt-2">
                <!-- post description -->
                @if($post->post_type == 'general' || $post->post_type == 'profile_picture' || $post->post_type == 'cover_photo')
                    @php echo script_checker($post->description); @endphp
                    
                    @include('frontend.main_content.media_type_post_view')

                    @if(!empty($post->location))
                        @include('frontend.main_content.location_type_post_view')         
                    @endif
                @elseif($post->post_type == 'share')

                   <div class="py-1">
                        <div class="text-quote">
                            @if (\Illuminate\Support\Str::contains($post->description, 'http','https'))
                                @php
                                    $explode_data = explode( '/', $post->description );
                                    $shared_id = end($explode_data);
                                @endphp
                                <iframe src="{{ $post->description }}?shared=yes" onload="resizeIframe(this)" scrolling="no"  class="w-100" frameborder="0"></iframe>
                                <a class="ellipsis-line-1 ellipsis-line-2" href="{{ $post->description }}">{{ $post->description }}</a>
                            @endif
                        </div>
                    </div>

                @elseif($post->post_type == 'live_streaming')
                    @include('frontend.main_content.live_streaming_type_post_view')
                @endif
            </div>
            <!-- END POST VIEW -->

            <div class="entry-meta py-2 d-flex border-bottom justify-content-between align-items-center" >
                <a href="javascript:void(0)" id="post_reacts<?php echo $post->post_id; ?>">
                    @include('frontend.main_content.post_reacts', ['post_react' => true])
                </a>

                <div class="post-comment">
                    <ul>
                        <li><a onclick="$('#user-comments-{{$post->post_id}}').toggle();" href="javascript:void(0)"><span id="post_comment_count{{ $post->post_id }}">{{$total_comments}}</span>{{get_phrase('Comments')}}</a></li>
                        @php $sharecount = \App\Models\Post_share::where('post_id',$post->post_id)->get()->count(); @endphp
                        <li><a href="javascript:void(0)"><span> {{ $sharecount }} </span>{{get_phrase('Share')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="entry-footer">
                <div class="footer-share pt-3 d-flex justify-content-around">
                    <span class="entry-react post-react">

                        <a href="javascript:void(0)" onclick="myReact('post', 'like', 'toggle', {{$post->post_id}})" id="my_post_reacts<?php echo $post->post_id; ?>">
                            @include('frontend.main_content.post_reacts', ['my_react' => true])
                        </a>

                        <ul class="react-list">
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'like', 'update', {{$post->post_id}})"><img src="{{asset('storage/images/like.svg')}}" alt="Like" style="margin-right: 1px;"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'love', 'update', {{$post->post_id}})"><img src="{{asset('storage/images/love.svg')}}" alt="Love" style="width: 30px; margin-top: 2px;"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'haha', 'update', {{$post->post_id}})"><img src="{{asset('storage/images/haha.svg')}}" alt="Haha"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'sad', 'update', {{$post->post_id}})"><img src="{{asset('storage/images/sad.svg')}}" class="mx-1" alt="Sad"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'angry', 'update', {{$post->post_id}})"><img src="{{asset('storage/images/angry.svg')}}" alt="Angry"></a>
                            </li>
                        </ul>
                    </span>
                    <span class="entry-react">
                        <a href="javascript:void(0)" onclick="$('#user-comments-{{$post->post_id}}').toggle();">
                            <img width="19px" src="{{asset('storage/images/comment2.svg')}}">
                            {{get_phrase('Comments')}}
                        </a>
                    </span>
                    <span class="entry-react" data-bs-toggle="modal" data-bs-target="">
                        <a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $post->post_id] )}}', '{{get_phrase('Share post')}}');">
                            <img width="19px" src="{{asset('storage/images/share2.svg')}}">
                            {{get_phrase('Share')}}
                        </a>
                    </span>
                    <!-- Post share modal -->
                    
                </div>
            </div> <!-- Entry Footer End -->
        </div>
        <!-- Comment Start -->
        <div class="user-comments d-hidden bg-white" id="user-comments-{{$post->post_id}}" >
            <div class="comment-form d-flex p-3 bg-secondary">
                <img src="{{get_user_image(Auth()->user()->photo, 'optimized')}}" alt="" class="rounded-circle img-fluid" width="40px">
                <form action="javascript:void(0)" class="w-100 ms-2" method="post">
                    <input class="form-control py-3" onkeypress="postComment(this, 0, {{$post->post_id}}, 0,'post');" rows="1" placeholder="Write Comments">
                </form>
            </div>
            <ul class="comment-wrap p-3 pb-0 list-unstyled" id="comments{{$post->post_id}}">
                @include('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$post->post_id,'type'=>"post"])
            </ul>

            @if($comments->count() < $total_comments)
                <a class="btn p-3 pt-0" onclick="loadMoreComments(this, {{$post->post_id}}, 0, {{$total_comments}},'post')">{{get_phrase('View more')}}</a>
            @endif
        </div>
    </div><!--  Single Entry End -->
    
    @if (isset($search)&&!empty($search))
        @if ($loopIndex==2)
            @break
        @endif
    @endif
@endforeach

@include('frontend.initialize')