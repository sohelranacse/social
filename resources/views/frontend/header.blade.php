<!-- header -->
    <div class="custom-progress-bar">
        <div class="custom-progress"></div>
    </div>
    <header class="header header-default py-3">
        <nav class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-sm-4">
                        <div class="logo-branding">
                            <button class="d-lg-none" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                                    class="fw-bold fa-solid fa-sliders-h"></i></button>
                            <!-- logo -->
                            @php
                                $system_light_logo = \App\Models\Setting::where('type', 'system_light_logo')->value('description');
                            @endphp
                            <a class="navbar-brand mt-2" href="{{route('timeline')}}"><img src="{{ get_system_logo_favicon($system_light_logo,'light') }}" class="logo_height_width" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <div class="header-search">
                            <a href="{{route('timeline')}}">
                                <div class="sc-home rounded">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                            </a>
                            <div class="sc-search">
                                <form action="{{route('search')}}" method="GET">
                                    <input type="search" class="rounded white-placeholder" name="search" value="@isset($_GET['search']){{$_GET['search']}}@endisset" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-8">
                        <div class="header-controls">
                            <div class="align-items-center d-flex justify-content-around">
                              
                                <div class="group-control">
                                    <a href="{{ route('profile.friends') }}" class="notification-button"><i class="fa-solid fa-user-group"></i></a>
                                </div>
                                @php
                                    $last_msg = \App\Models\Chat::where('sender_id',auth()->user()->id)->orWhere('reciver_id',auth()->user()->id)->orderBy('id','DESC')->limit('1')->first();
                                    if(!empty($last_msg)){
                                        if($last_msg->sender_id == auth()->user()->id){
                                            $msg_to = $last_msg->reciver_id;
                                        }else{
                                            $msg_to = $last_msg->sender_id;
                                        }
                                    }

                                    $unread_msg = \App\Models\Chat::where('reciver_id',auth()->user()->id)->where('read_status','0')->count();
                                @endphp
                                <div class="inbox-control">
                                    <a href="@if(!empty($last_msg)){{ route('chat',$msg_to) }} @endif" class="message_custom_button position-relative">
                                        <i class="fa-brands fa-rocketchat"></i>
                                        @if ($unread_msg>0)
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill notificatio_counter_bg">
                                                {{ get_phrase($unread_msg) }}
                                            </span>
                                        @endif
                                    </a>
                                </div>
                                @php
                                    $unread_notification = \App\Models\Notification::where('reciver_user_id',auth()->user()->id)->where('status','0')->count();
                                @endphp
                                <div class="notify-control">
                                    <a class="notification-button position-relative" href="{{ route('notifications') }}">
                                        <i class="fa-solid fa-bell"></i>
                                        @if ($unread_notification>0)
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill notificatio_counter_bg">
                                                {{ get_phrase($unread_notification) }}
                                            </span>
                                        @endif
                                    </a>
                                </div>
                                <div class="profile-control dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ get_user_image(auth()->user()->photo,'optimized') }}" class="rounded-circle" alt="">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('profile') }}">{{ get_phrase('My Profile') }}</a></li>
                                        @if (auth()->user()->user_role=="admin")
                                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ get_phrase('Go to admin panel') }}</a></li>
                                        @endif

                                        @if (auth()->user()->user_role == "general")
                                            <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">{{ get_phrase('Dashboard') }}</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('user.password.change') }}">{{ get_phrase('Change Password') }}</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="dropdown-item" href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ get_phrase('Log Out') }}
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header End -->