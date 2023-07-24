@php
    $events_joined_users_id = \App\Models\Event::where('id',$event_id)->first();
@endphp

    <div class="modal-body p-3">
        <div class="group-suggestion mt-3">
            <div class="sugest-wrap">
                @foreach (json_decode($events_joined_users_id->going_users_id, true)  as $goinguserid)
                   @php  
                        $going_user_details = App\Models\User::find($goinguserid);
                    @endphp
                      <div class="single-suggest d-flex justify-content-between align-items-center">
                        <div
                            class="suggest-avatar d-flex justify-content-between align-items-center">
                            <img class="user-round" width="40" src="{{get_user_image($going_user_details->photo, 'optimized')}}" alt="">
                            <h3 class="h6 ms-2"><a href="#"></a>
                                {{ $going_user_details->name }}
                            </h3>
                        </div>
                        <span class="badge bg-primary py-2 px-4">{{ get_phrase('Going') }}</span>
                    </div> 
                @endforeach

                @foreach (json_decode($events_joined_users_id->interested_users_id, true)  as $interesteduserid)
                   @php  
                        $interested_user_details = App\Models\User::find($interesteduserid);
                    @endphp
                      <div class="single-suggest d-flex justify-content-between align-items-center">
                        <div
                            class="suggest-avatar d-flex justify-content-between align-items-center">
                            <img class="user-round" width="40" src="{{get_user_image($interested_user_details->photo, 'optimized')}}" alt="">
                            <h3 class="h6 ms-2"><a href="#"></a>
                                {{ $interested_user_details->name }}
                            </h3>
                        </div>
                        <span class="badge bg-primary py-2 px-4">{{ get_phrase('Interested') }}</span>
                    </div> 
                @endforeach
            </div>
        </div>
    </div>
@include('frontend.initialize')