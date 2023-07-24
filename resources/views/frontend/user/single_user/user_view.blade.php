
<div class="profile-wrap">
    <div class="profile-cover rounded">
        <div class="profile-header" style="background-image: url('{{get_cover_photo($user_data->cover_photo)}}');">
            <div class="profile-avatar d-flex align-items-center ps-4">
                <div class="avatar avatar-xl"><img class="rounded-circle" src="{{get_user_image($user_data->photo, 'optimized')}}" alt=""></div>
                <div class="avatar-details">
                    <h3>{{$user_data->name}} </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-content mt-3">
        <div class="row gx-3">
            <div class="col-lg-7 col-sm-12">
                <nav class="profile-nav border bg-white mb-3">
                    <ul class="nav align-items-center justify-content-start">
                        <li class="nav-item @if(Route::currentRouteName() == 'user.profile.view') active @endif"><a href="{{route('user.profile.view',$user_data->id)}}" class="nav-link">{{get_phrase('Timeline')}}</a></li>
                        <li class="nav-item @if(Route::currentRouteName() == 'user.friends') active @endif"><a href="{{route('user.friends',$user_data->id)}}" class="nav-link">{{get_phrase('Friends')}}</a></li>
                        <li class="nav-item @if(Route::currentRouteName() == 'user.photos') active @endif"><a href="{{route('user.photos',$user_data->id)}}" class="nav-link">{{get_phrase('Photo')}}</a></li>
                        <li class="nav-item @if(Route::currentRouteName() == 'user.videos') active @endif"><a href="{{route('user.videos',$user_data->id)}}" class="nav-link">{{get_phrase('Video')}}</a></li>
                    </ul>
                </nav>

                @if(Route::currentRouteName() == 'user.friends')
                    @include('frontend.user.single_user.friends')
                @elseif(Route::currentRouteName() == 'user.photos')
                    @include('frontend.user.single_user.photos')
                @elseif(Route::currentRouteName() == 'user.videos')
                    @include('frontend.user.single_user.videos')
                @else
                    @if ($user_data->id == auth()->user()->id)
                        @include('frontend.main_content.create_post')
                    @endif
                    <div id="user-timeline-posts">
                        @include('frontend.main_content.posts',['type'=>'user_post'])
                    </div>
                @endif
            </div>
            <!-- COL END -->
            <div class="col-lg-5 col-sm-12">
                @include('frontend.user.single_user.user_info')
            </div>
        </div>
    </div>
    <!-- Profile content End -->
</div>

@include('frontend.main_content.scripts')