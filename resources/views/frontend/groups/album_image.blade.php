<form class="ajaxForm" action="{{ route('add.image.album') }}" method="post" enctype="multipart/form-data">
    @CSRF
    <input type="hidden" value="public" name="privacy" id="album_privacy">
    @if (isset($page_id)&&!empty($page_id))
      <input type="hidden" name="page_id" value="{{ $page_id }}" id="page_id">
    @endif
  
    @if (isset($group_id)&&!empty($group_id))
    <input type="hidden" name="group_id" value="{{ $group_id }}" id="group_id">
    @endif
    @if (isset($profile_id)&&!empty($profile_id))
    <input type="hidden" name="profile_id" value="{{ $profile_id }}" id="profile_id">
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
  </div>

    @isset($group_id)
        <div class="mb-3">
            <label for="image" class="form-label">{{get_phrase('Album')}}</label>
            <select name="album" id="album" class="form-control bg-secondary">
            <option value="" selected disabled>{{ get_phrase('Select Album') }}</option>
            @foreach (\App\Models\Albums::where('group_id',$group_id)->get(); as $album)
                <option value="{{ $album->id }}">{{ $album->title }}</option>
            @endforeach
            </select>
        </div>
    @endisset
    @isset($page_id)
        <div class="mb-3">
            <label for="image" class="form-label">{{get_phrase('Album')}}</label>
            <select name="album" id="album" class="form-control bg-secondary">
            <option value="" selected disabled>{{ get_phrase('Select Album') }}</option>
            @foreach (\App\Models\Albums::where('page_id',$page_id)->get(); as $album)
                <option value="{{ $album->id }}">{{ $album->title }}</option>
            @endforeach
            </select>
        </div>
    @endisset
    @isset($profile_id)
    <label for="image" class="form-label">{{get_phrase('Album')}}</label>
    <select name="album" id="album" class="form-control bg-secondary">
      <option value="" selected disabled>{{ get_phrase('Select Album') }}</option>
      @foreach (\App\Models\Albums::where('user_id',auth()->user()->id)->whereNull('page_id')->whereNull('group_id')->get(); as $album)
          <option value="{{ $album->id }}">{{ $album->title }}</option>
      @endforeach
      </select>
    @endisset

    <div class="mb-3">
      <label for="image" class="form-label">{{get_phrase('Album Images')}}</label>
      <input type="file" multiple name="images[]" class="form-control" id="image">
    </div>
    
    <div class="mb-3">
      <button type="submit" class="btn btn-primary w-100">{{get_phrase('Create')}}</button>
    </div>
  </form>
  @include('frontend.initialize')
  @include('frontend.common_scripts')