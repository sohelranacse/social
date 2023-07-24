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
                    <p>{{ get_phrase('All  people and  who join this group will appear here') }}</p>
                    
                    <div class="row py-3 border-bottom">
                        @foreach ($all_members as $recent_team_member)
                            <div class="d-flex justify-content-between my-1">
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
                    </div>
                </div> <!-- Member Entry End -->
            </div>
            <!--  Single Entry End -->
        </div> <!-- COL END -->
        <!--  Group Content Inner Col End -->
        @include('frontend.groups.bio')
    </div>
</div><!-- Group content End -->