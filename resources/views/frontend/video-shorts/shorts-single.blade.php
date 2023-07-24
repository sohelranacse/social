@foreach ($shorts as $short)
        <div class="video-shorts shorts-fixed-hight video-poster card single-item-countable" id="shorts-{{ $short->id }}">
            <div class="position-relative shorts-height">
                <video class="plyr-js shorts_custom_height w-100" onpause="onPause(this)" onplay="pauseOtherVideos(this)" id="{{ 'shorts_'.$short->id }}">
                    <source src="{{ asset('storage/videos/'.$short->file)  }}" type="">
                  </video>
                <div class="video-meta w-100 rounded-3" onclick="videoPlaytoggle('{{ '#shorts_'.$short->id }}')">
                    <div class="video-avatar custom-shorts-heading">
                        <h3 class="h6 shotrs-heading custom-text-shadow">{{get_phrase(ellipsis($short->title,'50'))}}</h3>
                        <div class="avatar-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="avatar-img"><img src="{{ get_user_image( $short->getUser->photo ,'optimized') }}" class="user_image_show_on_modal rounded-circle" alt=""></div>
                                <div class="avatar-info ms-2">
                                    <h6 class="mb-0 "><a href="#" class="custom-text-shadow">{{ $short->getUser->name }} </a></h6>
                                    <span class="small-text">{{ $short->created_at->timezone(Auth::user()->timezone)->format("M d") }} at {{ date('H:i A', strtotime($short->created_at)); }}</span>
                                </div>
                            </div>
                            @php
                                $follow = \App\Models\Follower::where('user_id',auth()->user()->id)->where('follow_id',$short->getUser->id)->count();
                            @endphp
                            @if ($follow>0)
                                <a href="javascript:void(0)" onclick="event.stopPropagation(); ajaxAction('<?php echo route('user.unfollow',$short->getUser->id); ?>')" class="btn btn-primary">{{ get_phrase('Unfollow') }}</a> 
                            @else
                                <a href="javascript:void(0)" onclick="event.stopPropagation(); ajaxAction('<?php echo route('user.follow',$short->getUser->id); ?>')" class="btn btn-primary">{{ get_phrase('Follow') }}</a> 
                            @endif
                        </div>
                    </div>
                    @php
                        $post = \App\Models\Posts::where('publisher', 'video_and_shorts')->where('publisher_id',$short->id)->first();
                        $total_comments = DB::table('comments')->where('comments.is_type', 'post')->where('comments.id_of_type', $post->post_id)->where('comments.parent_id', 0)->get()->count();
                        $reply_comments = \App\Models\Comments::where('is_type', 'post')->where('id_of_type', $post->post_id)->whereNotNull('parent_id')->get()->count();
                        $total_comments = $total_comments + $reply_comments;
                        $totalreact = count(json_decode($post->user_reacts,true));
                        $user_reacts = json_decode($post->user_reacts, true);
                    @endphp
                    <div class="video-share fs-4">
                        @php
                            $user_info = \App\Models\User::find($short->getUser->id);
                        @endphp
                        <span class="entry-react post-react fs-6 custom-text-shadow">
                            <a href="#" onclick="event.stopPropagation(); myReact('post', 'like', 'toggle', {{$post->post_id}}, 'number')" id="reactNumber<?php echo $post->post_id; ?>">
                                @include('frontend.main_content.post_reacts', ['my_react' => true,'user_reacts'=>$user_reacts,'user_info'=>$user_info,'type'=>'shorts']) 
                                <span class="custom-text-shadow appendNumber"> {{ $totalreact }}</span>
                            </a>
                        </span>
                        <a href="#" onclick="event.stopPropagation();" data-bs-toggle="modal" data-bs-target="#ShortChat{{ $short->id }}"> <i class="fa-solid fa-comment custom-text-shadow"></i> <br> <span class="fs-6">{{ $total_comments }}</span></a>
                        <a href="#" onclick="event.stopPropagation(); showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $post->post_id] )}}', '{{get_phrase('Share post')}}');"> <i class="fa-solid fa-share"></i><span class="fs-6 custom-text-shadow">{{get_phrase('Share')}}</span></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($shorts as $short)
        <div class="modal fade chat-box" id="ShortChat{{ $short->id }}" tabindex="-1"  aria-labelledby="videoChatLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary d-flex">
                        <h5 class="modal-title text-white" id="exampleModalLabel">
                            {{get_phrase('Comments')}}</h5>
                        <div class="chat-actions">
                            <button type="button" class="btn" data-bs-dismiss="modal"
                                aria-label="Close"><i
                                    class="fa fa-close fa-xl"></i></button>
                        </div>
                    </div>
                    @php
                        $post = \App\Models\Posts::where('publisher_id',$short->id)->where('publisher','video_and_shorts')->first();
                        $comments = \App\Models\Comments::where('is_type','post')->where('id_of_type',$post->post_id)->get();
                    @endphp
                    <div class="modal-body">
                        <div class="user-comments bg-white" id="user-comments-{{$post->post_id}}" >
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
                    </div>                              
                 </div>
            </div>
        </div>
    @endforeach
@include('frontend.initialize')
    