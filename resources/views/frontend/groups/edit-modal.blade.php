
@php
    $group = \App\Models\Group::find($group_id);
@endphp
<form class="ajaxForm" action="{{ route('group.update',$group->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="#">{{ get_phrase('Group Title') }}</label>
        <input type="text" class="border-0 bg-secondary" name="name" value="{{ $group->title }}" placeholder="{{ get_phrase('Enter your group title')}}">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Group Sub Title') }}</label>
        <input type="text" class="border-0 bg-secondary" name="subtitle" value="{{ $group->subtitle }}" placeholder="{{ get_phrase('Enter your group sub title')}}">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Group Location') }}</label>
        <input type="text" class="border-0 bg-secondary" name="location" value="{{ $group->location }}" placeholder="{{ get_phrase('Enter your group location')}}">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Group Type') }}</label>
        <input type="text" class="border-0 bg-secondary" name="group_type" value="{{ $group->group_type }}" placeholder="{{ get_phrase('Enter your group type')}}">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('About') }}</label>
        <textarea name="about" class="border-0 bg-secondary content" id="about" cols="30" rows="10">{{ $group->about }}</textarea>
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Privacy') }}</label>
        <select name="privacy" id="privacy" class="form-control border-0 bg-secondary">
            <option value="public" {{ $group->privacy=="public" ? "selected":"" }}>Public</option>
            <option value="private" {{ $group->privacy=="private" ? "selected":"" }}>Private</option>
        </select>
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Status') }}</label>
        <select name="status" id="status" class="form-control border-0 bg-secondary">
            <option value="1" {{ $group->status=="1" ? "selected":"" }}>Active</option>
            <option value="0" {{ $group->status=="0" ? "selected":"" }}>Deactive</option>
        </select>
    </div>
    <div>
        <label for="">{{ get_phrase('Previous Profile Photo') }}</label> <br>
        <img src="{{ get_group_logo($group->logo, 'logo') }}" class="w-20 height-100-css" alt="">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Update Profile Photo') }}</label>
        <input type="file" name="image" id="image" class="form-control border-0 bg-secondary">
    </div>
    <button type="submit" class="w-100 btn btn-primary">{{ get_phrase('Edit Group') }}</button>
</form>


@include('frontend.initialize')