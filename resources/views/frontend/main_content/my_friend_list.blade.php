@php
    $friends = \App\Models\Friendships::where(function ($query) {
            $query->where('accepter', auth()->user()->id)
            ->orWhere('requester', auth()->user()->id);
        })
        ->where('is_accepted', 1)
        ->orderBy('friendships.importance', 'desc')->get();
@endphp

@foreach ($friends as $friend)

@if($friend->requester == auth()->user()->id)
        @php $friends_user_data = DB::table('users')->where('id', $friend->accepter)->first(); @endphp
    @else
        @php $friends_user_data = DB::table('users')->where('id', $friend->requester)->first(); @endphp
    @endif
<div class="d-flex justify-content-between align-items-center">
    <div class="user-information d-flex">
        <img src="{{get_user_image($friends_user_data->photo, 'optimized')}}" class="rounded-circle user_image_show_on_modal" alt="">
        <h6 class="align-self-center mx-3">{{$friends_user_data->name}}</h6>
    </div>
    <form class="ajaxForm" id="chatMessageFieldForm" action="{{ route('chat.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="reciver_id" value="{{ $friends_user_data->id }}" id="">
        <input type="hidden" name="thumbsup" value="0" id="">
        @if(isset($post_id)&&!empty($post_id))
            <input type="hidden" name="message" value="{{ route('single.post',$post_id) }}">
            <input type="hidden" name="shared_post_id" value="{{$post_id }}">
        @endif
        @if(isset($product_id)&&!empty($product_id))
                    <input type="hidden" name="productUrl" value="{{ route('single.product',$product_id) }}">
                    <input type="hidden" name="shared_product_id" value="{{$product_id }}">
                @endif
        <div class="message-send-area">
            <button type="submit" class="btn btn-primary send"> {{get_phrase('Send')}} </button>
        </div>
    </form>
</div>
@endforeach