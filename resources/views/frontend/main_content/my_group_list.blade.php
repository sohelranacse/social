@php
    $groups = \App\Models\Group_member::where('user_id',auth()->user()->id)->where('is_accepted','1')->get();
@endphp
@foreach ($groups as $group )
<form class="ajaxForm" action="{{ route('share.group.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="d-flex justify-content-between align-items-center">
        <div class="user-information d-flex">
            <img src="{{ get_group_logo($group->getGroup->logo,'logo') }}" class="rounded-circle user_image_show_on_modal" alt="">
            <h6 class="align-self-center mx-3">{{ $group->getGroup->title }}</h6>
        </div>
        <input type="hidden" name="group_id" id="group_id" value="{{ $group->getGroup->id }}">
        @if(isset($post_id)&&!empty($post_id))
            <input type="hidden" name="message" value="{{ route('single.post',$post_id) }}">
            <input type="hidden" name="shared_post_id" value="{{$post_id }}">
        @endif
        @if(isset($product_id)&&!empty($product_id))
            <input type="hidden" name="productUrl" value="{{ route('single.product',$product_id) }}">
            <input type="hidden" name="shared_product_id" value="{{$product_id }}">
        @endif
        <div class="message-send-area">
            <button type="submit" class="btn btn-primary send"> {{get_phrase('Share On Group')}} </button>
        </div>
    </div>
</form>
@endforeach