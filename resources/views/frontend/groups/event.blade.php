@include('frontend.groups.cover-photo')

<div class="group-content profile-content">
    <div class="row gx-3">
        <div class="col-lg-7 col-sm-12">
            @include('frontend.groups.iner-nav')
            <!-- People Nav End -->
         
            <!-- Event Content Start -->
            <div class="event-content">
                <div class="card create-event text-center">
                    <div class="upcoming-event">
                        @php
                            $query = DB::table('events')->where('group_id',$group->id)->where('privacy','public')
                            ->whereDate('event_date', '>', now());
                            $number_of_upcoming_events = $query->get()->count();
                        @endphp
                        @if($number_of_upcoming_events > 0)
                            <i class="fa-solid fa-calendar text-primary"></i>
                            <p class="p-0 m-0">{{get_phrase('Nearest event')}}, <b>{{date_formatter($query->first()->event_date.' '.$query->first()->event_time, 3)}}</b></p>
                        @else
                            <i class="fa-solid fa-calendar-xmark"></i>
                        @endif
                        
                        <p class="mute">
                            @if($number_of_upcoming_events > 0)
                                {{ get_phrase('Total ____ Upcoming events', [$number_of_upcoming_events]) }}
                            @else
                                {{ get_phrase('No upcoming events') }}
                            @endif
                        </p>
                    </div>
                    <a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.events.create_event','group_id'=>$group->id])}}', '{{get_phrase('Create Event')}}');" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#createEvent" class="btn btn-sm btn-primary d-block">{{get_phrase('Create Event')}}</a>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-body"><h3 class="h6 fw-7">{{ get_phrase('Post Events') }}</h3></div>
                            @foreach ($group_events as $event )
                                <div class="single-event card my-2 border-0 px-3" id="event-{{ $event->id }}">
                                    <div class="row g-0">
                                        <div class="col-md-5 col-lg-12 col-xl-5" style="background-image: url('{{ viewImage('event',$event->banner,'thumbnail') }}'); background-size: 100%; background-position: center; background-repeat: no-repeat; background-color: #f3f3f3;">
                                        </div>
                                        <div class="col-md-7 col-lg-12 col-xl-7">
                                            <div class="card-body group-event-dotted">
                                                
                                                <h5 class="card-title dotted d-flex">
                                                    <span>{{ ellipsis($event->title, 80) }}</span>
                                                    <div class="dropdown p-0 m-0">
                                                        <a class="nav-link dropdown-toggle" href="#" id="eventDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                                        <ul class="dropdown-menu" aria-labelledby="eventDropdown">
                                                            <li>
                                                                <button onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.events.edit_event', 'event_id' => $event->id] )}}', '{{get_phrase('Edit Event')}}');" class="dropdown-item btn btn-primary btn-sm" data-bs-toggle="modal"
                                                                    data-bs-target="#createEvent"><i class="fa fa-edit me-1"></i> {{get_phrase('Edit Event')}}</button>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('event.delete', ['event_id' => $event->id]); ?>', true)" class="dropdown-item btn btn-primary btn-sm"><i class="fa fa-trash me-1"></i> {{get_phrase('Delete Event')}}</a>
                                                            </li>
                                                        </ul>
                                                        
                                                    </div>
                                                </h5>
                                                <div class="card-text p-0 m-0">
                                                    <div class="d-flex gap-2 align-items-center mt-3 line-height16px">
                                                        <div class=""> <img src="{{get_user_image($event->getUser->photo, 'optimized')}}" class="rounded-circle group_event_user_img_w w-45px" alt=""> </div>
                                                        <span><small>{{get_phrase('Created by')}}</small>, <a href="{{route('user.profile.view', $event->getUser->id)}}"><b>{{ $event->getUser->name }}</b></a></span>
                                                    </div>
                                                </div>
                                                <small class="line-height16px">{{ date('l', strtotime($event->event_date)) }}, {{ date('d F Y', strtotime($event->event_date))  }}, at {{ $event->event_time }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Content End -->
        </div> <!-- COL END -->
        <!--  Group Content Inner Col End -->
        @include('frontend.groups.bio')
    </div>
</div><!-- Group content End -->

