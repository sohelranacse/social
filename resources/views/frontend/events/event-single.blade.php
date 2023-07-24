@foreach ($events as $key => $event )
@php  
 $postOfThisEvent = \App\Models\Posts::where('publisher','event')->where('publisher_id',$event->id)->first(); 
 if(!empty($postOfThisEvent->post_id)){
    $postId = $postOfThisEvent->post_id;
 }else{
    $postId = 0;
 }


@endphp
<div class="col-lg-6 col-xl-4 col-md-4 col-sm-6 single-item-countable" id="event-{{ $event->id }}">
            
    <div class="card event-card p-2">
        <a href="{{ route('single.event',$event->id) }}">
            <div class="event-image thumbnail-210-200" style="background-image: url('{{ viewImage("event",$event->banner,"thumbnail") }}')">
                <div class="event-date">
                    @php $date = explode("-",$event->event_date); @endphp
                    <span>{{ $date['2']}}</span>
                </div>
            </div>
        </a>
        <div class="event-text">
            <small class="event-meta">{{ date('l', strtotime($event->event_date)) }}, {{ date('d F Y', strtotime($event->event_date))  }}, at {{ $event->event_time }}</small>
            <h3><a class="ellipsis-line-2" href="{{ route('single.event',$event->id) }}">{{ ellipsis($event->title, 100) }}</a></h3>
            <div class="organiser d-flex mt-3 align-items-center">
                <a href="#"><img src="{{get_user_image($event->getUser->photo, 'optimized')}}" width="35" class="user-round" alt=""></a>
                <div class="ognr-info ms-2">
                    <h6 class="m-0"><a href="#">{{ $event->getUser->name }}</a></h6>
                    <small class="mute">{{ $event->location }}</small>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-2">
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.going',$event->id); ?>')" class="btn btn-primary @if (in_array(auth()->user()->id, json_decode($event->going_users_id))) displaynone @endif" id="goingId{{ $event->id }}"> {{get_phrase('Going')}}</a>
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.notgoing',$event->id); ?>')" class="btn btn-secondary @if (!in_array(auth()->user()->id, json_decode($event->going_users_id))) displaynone @endif" id="notGoingId{{ $event->id }}"> {{get_phrase('Cancel')}}</a>

                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.interested',$event->id); ?>')" class="btn btn-primary @if (in_array(auth()->user()->id, json_decode($event->interested_users_id))) displaynone @endif" id="interestedId{{ $event->id }}"> {{get_phrase('Interested')}}</a>
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.notinterested',$event->id); ?>')" class="btn btn-secondary @if (!in_array(auth()->user()->id, json_decode($event->interested_users_id))) displaynone @endif" id="notInterestedId{{ $event->id }}"> {{get_phrase('NotInterested')}}</a>
                
                
                <div class="post-controls dropdown">
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis"></i> 
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @if ($event->user_id==auth()->user()->id)
                            <li>
                                <button onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.events.edit_event', 'event_id' => $event->id] )}}', '{{get_phrase('Edit Event')}}');" class="dropdown-item btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#createEvent"><i class="fa fa-edit me-1"></i> {{get_phrase('Edit Event')}}</button>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('event.delete', ['event_id' => $event->id]); ?>', true)" class="dropdown-item btn btn-primary btn-sm"><i class="fa fa-trash me-1"></i> {{get_phrase('Delete Event')}}</a>
                            </li>
                            @endif
                            @if ($postId!=0)
                            <li>
                                <a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId] )}}', '{{get_phrase('Share Event')}}');" class="dropdown-item "><i class="fa fa-share me-1"></i> {{get_phrase('Share Event')}}</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (isset($search)&&!empty($search))
    @if ($key==2)
    @break
    @endif
@endif

@endforeach