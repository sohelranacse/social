@foreach($friendships as $friendship)
    @if($friendship->requester == $user_data->id)
        @php $friends_user_data = DB::table('users')->where('id', $friendship->accepter)->first(); @endphp
    @else
        @php $friends_user_data = DB::table('users')->where('id', $friendship->requester)->first(); @endphp
    @endif

    @php
    $number_of_friend_friends = json_decode($friends_user_data->friends);
    $number_of_my_friends = json_decode($user_info->friends);

    if(!is_array($number_of_friend_friends)) $number_of_friend_friends = array();
    if(!is_array($number_of_my_friends)) $number_of_my_friends = array();
    
    $number_of_mutual_friends = count(array_intersect($number_of_friend_friends, $number_of_my_friends));
    @endphp
    <div class="single-item-countable d-flex friend-item align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center w-100">
            <!-- Avatar -->
            <div class="avatar">
                <a href="#!"><img class="avatar-img rounded-circle user_image_show_on_modal" src="{{get_user_image($friends_user_data->photo, 'optimized')}}" alt="" ></a>
            </div>
            <div class="avatar-info ms-2">
                <h6 class="mb-1"><a href="{{ route('user.profile.view',$friends_user_data->id) }}">{{$friends_user_data->name}}</a></h6>
                <div class="activity-time small-text text-muted">{{$number_of_mutual_friends}} {{get_phrase('Mutual Friends')}}</div>
            </div>
        </div>
    </div>
@endforeach