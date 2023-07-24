@foreach($friend_requests as $friend_request)
	@php $requester_user_data = DB::table('users')->where('id', $friend_request->requester)->first(); @endphp
		
	@php
	$number_of_friend_friends = json_decode($requester_user_data->friends);
	$number_of_my_friends = json_decode($user_info->friends);

	if(!is_array($number_of_friend_friends)) $number_of_friend_friends = array();
    if(!is_array($number_of_my_friends)) $number_of_my_friends = array();

	$number_of_mutual_friends = count(array_intersect($number_of_friend_friends, $number_of_my_friends));
	@endphp
	<div class="single-item-countable col-6" id="friendRequest{{$requester_user_data->id}}">
	    <div class="card">
	        <div class="mb-2"><img src="{{get_user_image($requester_user_data->photo, 'optimized')}}" class="rounded-circle user_image_show_on_modal img-fluid" alt=""></div>
	        <div class="card-details">
	            <h6><a href="#">{{$requester_user_data->name}}</a></h6>
	            <span class="mute">{{$number_of_mutual_friends}} {{get_phrase('Mutual Friends')}}</span>
	            <div class="card-control">
	            	<form class="ajaxForm" action="{{route('profile.accept_friend_request')}}" method="post">
	            		@CSRF
	            		<input type="hidden" name="user_id" value="{{$requester_user_data->id}}">
	                	<button type="submit" id="friendRequestConfirmBtn{{$requester_user_data->id}}" class="btn btn-primary w-100">{{get_phrase('Confirm')}}</button>
	                	<button type="button" id="friendRequestAcceptedBtn{{$requester_user_data->id}}" class="btn btn-secondary w-100 d-hidden">{{get_phrase('Accepted')}}</button>
	                </form>
	                <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('profile.delete_friend_request', ['user_id' => $requester_user_data->id]); ?>', true)" class="btn btn-secondary d-block">{{get_phrase('Delete')}}</a>
	            </div>
	        </div>
	    </div>
	</div>
@endforeach