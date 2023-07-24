<form class="ajaxForm" action="{{route('profile.album', ['action_type' => 'store'])}}" method="post" enctype="multipart/form-data">
  @CSRF
  <input type="hidden" value="public" name="privacy" id="album_privacy">
  @if (isset($page_id)&&!empty($page_id))
    <input type="hidden" name="page_id" value="{{ $page_id }}" id="page_id">
  @endif

  @if (isset($group_id)&&!empty($group_id))
  <input type="hidden" name="group_id" value="{{ $group_id }}" id="group_id">
  @endif

<div class="mb-3 w-100 d-flex">
  @if (isset($page_id)&&!empty($page_id))
  @php
    $page = \App\Models\Page::find($page_id);
  @endphp
    <a href="{{route('single.page',$page_id)}}" class="author-thumb d-flex align-items-center">
      <img src="{{get_page_logo($page->logo, 'logo')}}" class="rounded-circle user_image_show_on_modal" alt="">
      <h6 class="ms-2">{{$page->title}}</h6>
    </a>
  @elseif (isset($group_id)&&!empty($group_id))
    @php
      $group = \App\Models\Group::find($group_id);
    @endphp
      <a href="{{route('single.group',$group_id)}}" class="author-thumb d-flex align-items-center">
        <img src="{{get_group_logo($group->logo, 'logo')}}" class="rounded-circle user_image_show_on_modal" alt="">
        <h6 class="ms-2">{{$group->title}}</h6>
      </a>
  @else
    <a href="{{route('profile')}}" class="author-thumb d-flex align-items-center">
      <img src="{{get_user_image('', 'optimized')}}" class="rounded-circle user_image_show_on_modal" alt="">
      <h6 class="ms-2">{{auth()->user()->name}}</h6>
    </a>
  @endif
  <div class="dropdown ms-auto">
      <button class="btn btn-gray dropdown-toggle" type="button" id="albumPrivacyDroupdownBtn" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-earth-americas"></i> {{get_phrase('Public')}}
      </button>
      <ul class="dropdown-menu" aria-labelledby="postPrivacyDroupdownBtn">
          <li><a class="dropdown-item" href="javascript:void(0)" onclick="album_privacy('private', this)"><i class="fa-solid fa-user"></i> {{get_phrase('Only Me')}}</a>
          </li>
          <li><a class="dropdown-item" href="javascript:void(0)" onclick="album_privacy('friends', this)"><i class="fa-solid fa-users"></i> {{get_phrase('Friends')}}</a>
          </li>
          <li><a class="dropdown-item" href="javascript:void(0)" onclick="album_privacy('public', this)"><i class="fa-solid fa-user-group"></i> {{get_phrase('Public')}}</a></li>
      </ul>
  </div>
</div>

  <div class="mb-3">
    <label for="input0" class="form-label">{{get_phrase('Album title')}}</label>
    <input name="title" type="text" class="form-control" id="input0">
  </div>
  <div class="mb-3">
    <label for="input1" class="form-label">{{get_phrase('Album subtitle')}}</label>
    <input name="sub_title" type="text" class="form-control" id="input1">
  </div>
  <div class="mb-3">
    <label for="input2" class="form-label">{{get_phrase('Thumbnail')}}</label>
    <input name="thumbnail" type="file" class="form-control" id="input2">
  </div>
  
  <div class="mb-3">
    <button type="submit" class="btn btn-primary w-100">{{get_phrase('Create')}}</button>
  </div>
</form>

<script type="text/javascript">
  "use strict";
  function album_privacy(privacy, e){
    $('#album_privacy').val(privacy);
    $('#albumPrivacyDroupdownBtn').html($(e).html());
  }
</script>

@include('frontend.initialize')