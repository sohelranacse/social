
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

    <div class="single-item-countable single-entry" id="">
        <div class="entry-inner"> 
            <div class="entry-header d-flex justify-content-between @if(isset($_GET['shared'])) hidden-on-shared-view @endif">
                <div class="ava-info d-flex align-items-center">
                    @if (isset($type)&&$type=="page")
                        <div class="flex-shrink-0">
                            <img src="{{get_page_logo($post->logo, 'logo')}}" class="rounded-circle" alt="...">
                        </div>  
                    @elseif (isset($type)&&$type=="group")
                        <div class="flex-shrink-0">
                            <img src="{{get_user_image('storage/userimage/'.$post->photo, 'optimized')}}" class="rounded-circle" alt="...">
                        </div>
                    @elseif (isset($type)&&$type=="video")
                        <div class="entry-header d-flex justify-content-between">
                            <div class="ava-info d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ get_user_image($post->photo,'optimized') }}" class="rounded rounded-circle" alt="...">
                                
                                </div>
                                <div class="ava-desc ms-2">
                                    <h3 class="mb-0">{{ $post->name }} <a href="#">{{ get_phrase('Follow')}}</a></h3>
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
                                    <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/frontend/images/save.png') }}" alt="">{{ get_phrase('Save Video')}}</a></li>
                                    <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/frontend/images/link.png') }}" alt="">{{ get_phrase('Copy Link')}}</a></li>
                                    <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/frontend/images/report.png') }}" alt="">{{ get_phrase('Report')}} </a></li>
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
                                <a class="text-black" href="{{ route('user.profile.view',$post->user_id) }}">{{$post->getUser->name}}</a>
                            @endif
                            <!-- Check tagged users -->

                            @if($post->post_type == 'live_streaming')
                                <small class="text-muted">{{get_phrase('is live now')}}</small>
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
                        <span class="meta-time text-muted">{{date_formatter($post->created_at, 2)}}</span>

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
                                
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.main_content.create_report','post_id'=>$post->post_id])}}', '{{get_phrase('Report Post')}}');" data-bs-toggle="modal"
                                    data-bs-target="#createEvent"><img src="{{asset('storage/images/report.png')}}" alt="">{{get_phrase('Report')}}
                                        </a></li> 
                    </ul>
                </div> 
            </div>
            <div class="entry-content pt-2">
                @if($post->post_type == 'general' || $post->post_type == 'profile_picture' || $post->post_type == 'cover_photo')
                    
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

                                                    <video muted controlsList="nodownload" controls class="plyr-js w-100 rounded video-thumb @if($media_files_count > 1) initialized @endif">
                                                        <source src="{{get_post_video($media_file->file_name)}}" type="">
                                                    </video>

                                                    @if($more_unloaded_images > 0 && $key == 4)
                                                        <div class="more_image_overlap"><span><i class="fa-solid fa-plus"></i> {{$more_unloaded_images}} </span></div>
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
                                                        <div class="more_image_overlap"><span><i class="fa-solid fa-plus"></i> {{$more_unloaded_images}} </span></div>
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
                    
                    

                    @if(!empty($post->location))
                        <div class="text-center">
                            <img width="200px" src="{{asset('storage/images/map-pin.jpeg')}}"><br>
                            <a class="location-post me-auto ms-auto" href="https://www.google.com/maps/place/{{$post->location}}" target="_blanck">
                                <img src="{{asset('storage/images/location.png')}}">
                                <span>{{$post->location}}</span>
                                <hr>
                                <small>@php echo DB::table('posts')->where('location', $post->location)->get()->count() @endphp {{get_phrase('visits')}}</small>
                            </a>
                        </div>              
                    @endif
                @elseif($post->post_type == 'live_streaming')
                    <div class="row">
                        <div class="col-12 text-center">
                            <span class="live-icon">
                                <i class="fa fa-dot-circle"></i>
                                {{get_phrase('LIVE')}}
                            </span>
                            <img class="live-image my-4" src="{{asset('storage/images/live.png')}}">
                        </div>
                        <div class="col-12 text-center pt-5">
                            <a class="live-watch-now mt-3" href="{{route('live', ['post_id' => $post->post_id])}}"><i class="fa fa-video"></i> {{get_phrase('Watch now')}}</a>
                        </div>
                    </div>
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
                @endif
                
            </div>
            <div class="entry-meta py-4 d-flex border-bottom justify-content-between align-items-center " >
                <a href="javascript:void(0)" id="post_reacts<?php echo $post->post_id; ?>">
                    @include('frontend.main_content.post_reacts', ['post_react' => true])
                </a>

                <div class="post-comment">
                    <ul>
                        <li><a onclick="$('#user-comments-{{$post->post_id}}').toggle();" href="javascript:void(0)"><span id="post_comment_count{{ $post->post_id }}" >{{$total_comments}}</span>{{get_phrase('Comments')}}</a></li>
                        <li><a href="javascript:void(0)"><span>0</span>{{get_phrase('Share')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="entry-footer @if(isset($_GET['shared'])) hidden-on-shared-view @endif">
                <div class="footer-share pt-3 d-flex justify-content-around">
                    <span class="entry-react post-react">

                        <a href="javascript:void(0)" onclick="myReact('post', 'like', 'toggle', {{$post->post_id}})" id="my_post_reacts<?php echo $post->post_id; ?>">
                            @include('frontend.main_content.post_reacts', ['my_react' => true])
                        </a>

                        <ul class="react-list">
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'like', 'update', {{$post->post_id}})"><img src="{{asset('storage/images/r-like.png')}}" alt="Like"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'love', 'update', {{$post->post_id}})"><img src="{{asset('storage/images/r-love.png')}}" alt="Love"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'sad', 'update', {{$post->post_id}})"><img src="{{asset('storage/images/r-cry1.png')}}" alt="Sad"></a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="myReact('post', 'angry', 'update', {{$post->post_id}})"><img src="{{asset('storage/images/r-angry.png')}}" alt="Angry"></a>
                            </li>
                        </ul>
                    </span>
                    <span class="entry-react"><a href="javascript:void(0)" onclick="$('#user-comments-{{$post->post_id}}').toggle();"><i class="fa-solid fa-comment"></i>{{get_phrase('Comments')}}</a></span>
                    <span class="entry-react" data-bs-toggle="modal" data-bs-target="#exampleModal"><a
                            href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $post->post_id] )}}', '{{get_phrase('Share post')}}');"><i class="fa fa-share"></i>{{get_phrase('Share')}}</a></span>
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

@include('frontend.main_content.scripts')

<script src="{{asset('assets/frontend/gallery/jquery.justifiedGallery.min.js')}}"></script>
@include('frontend.initialize')