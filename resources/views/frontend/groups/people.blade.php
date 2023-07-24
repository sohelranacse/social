<div class="profile-cover group-cover rounded mb-3">
    @include('frontend.groups.cover-photo')
</div>
<div class="group-content profile-content">
    <div class="row gx-3">
        <div class="col-lg-7 col-sm-12">
            @include('frontend.groups.iner-nav')
            <!-- People Nav End -->
            <div class="people-wrap p-3 border bg-white">
                <div class="member-entry gr-search">
                    <h3 class="h6 mb-0 fw-7">{{ get_phrase('Members') }} {{ $total_member }}</h3>
                    <p>{{ get_phrase('New people and Pages who join this group will appear here') }}</p>
                   
                    @foreach ($recent_team_member as $recent_team_member)
                        <div class="entry-header d-flex justify-content-between py-3 border-bottom">
                            <div class="ava-info d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ get_user_image($recent_team_member->getUser->photo,'optimized') }}" class="circle rounded-circle user_image_show_on_modal" alt="...">
                                </div>
                                <div class="ava-desc ms-2">
                                    <h3 class="mb-0 h6">{{ $recent_team_member->getUser->name }}</h3>
                                    <span class="meta-time text-muted">{{ $recent_team_member->getUser->username }}</span>
                                </div>
                            </div>
                            @if($recent_team_member->user_id==auth()->user()->id)
                            <div class="post-controls dropdown dotted">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->id); ?>')">
                                            {{ get_phrase('Leave Group') }}</a></li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    @endforeach
                    <a href="{{ route('all.people.group.view',$group->id) }}" class="btn d-block mt-4 btn-secondary">{{ get_phrase('See More') }}</a>
                </div> <!-- Member Entry End -->
                <div class="group-friend mt-4">
                    <h3 class="h6 fw-7 mb-4">{{ get_phrase('Friends') }} {{ $friends_count }}</h3>
                    <div class="gr-wrap mt-3">
                        @foreach ($friends as $friend)
                        @if ($friend->getFriend->id==auth()->user()->id)
                            @continue
                        @endif
                            <div class="single-friend gap-3 d-flex align-items-start">
                                <div class="avatar"><a href="#"><img class="img-fluid rounded-circle rounded-circle"
                                    src="{{ get_user_image($friend->getFriend->id,'optimized') }}" alt=""></a></div>
                                <h3><a href="#">{{ $friend->getFriend->name }}</a> <span>{{ $friend->getFriend->username }}</span></h3>
                                <a href="{{ route('chat',$friend->getFriend->id) }}" class="btn btn-secondary ms-auto"><img src="{{ asset('assets/frontend/images/message-b.png') }}" alt="message">Message</a>
                            </div> 
                        @endforeach
                    </div>
                </div> <!-- Group Friend End -->
                <div class="group-friend mt-5">
                    <h3 class="h6 fw-7 mb-4">{{ get_phrase('Members With Things in Common') }}</h3>
                    <div class="gr-wrap mt-3">
                        @foreach ($users as $user)
                            <div class="single-friend gap-3 d-flex align-items-start">
                                <div class="avatar"><a href="#"><img class="img-fluid rounded-circle"
                                    src="{{ get_user_image($user->photo,'optimized') }}" alt=""></a></div>
                                <h3><a href="#">{{ $user->name }}</a> <span>{{ $user->username }}</span></h3>
                                @php
                                    $user_id = $user->id;
                                    $friend = \App\Models\Friendships::where(function($query) use ($user_id){
                                        $query->where('requester', auth()->user()->id);
                                        $query->where('accepter', $user_id);
                                    })
                                    ->orWhere(function($query) use ($user_id) {
                                        $query->where('accepter', auth()->user()->id);
                                        $query->where('requester', $user_id);
                                    })
                                    ->count();
                                @endphp
                                @if ($friend>0)
                                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.unfriend',$user->id); ?>')" class="btn btn-primary ms-auto"><i class="fa-solid fa-xmark"></i> {{ get_phrase('Cancel') }}</a>
                                @else   
                                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.friend',$user->id); ?>')" class="btn btn-secondary ms-auto"><i class="fa-solid fa-plus"></i> {{ get_phrase('Add Friend') }} </a>
                                @endif
                            </div> <!-- Add Friend End -->
                        @endforeach
                    </div>
                </div> <!-- Group Friend End -->
            </div>
            <!--  Single Entry End -->
        </div> <!-- COL END -->
        <!--  Group Content Inner Col End -->
        @include('frontend.groups.bio')
    </div>
</div><!-- Group content End -->