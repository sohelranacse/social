<form class="ajaxForm" action="{{ route('group.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="entry-header d-flex justify-content-between">
        <div class="ava-info d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="{{ get_user_image(auth()->user()->photo,'optimized') }}" class="rounded-circle user_image_show_on_modal" alt="...">
            </div>
            <div class="ava-desc ms-2">
                <h3 class="mb-0 h6">{{ auth()->user()->name }}</h3>
                <span class="meta-time text-muted"><a href="#">{{ auth()->user()->profession }}</a></span>
            </div>
        </div>
        <div class="form-group">
            <select name="privacy" id="privacy" class="form-control border-0 bg-secondary">
                <option class="dropdown-item" value="public">{{ get_phrase('Public') }}</option>
                <option class="dropdown-item" value="private">{{ get_phrase('Private') }}</option>
            </select>
        </div>
        
    </div>

    <div class="form-group pt-2">
        <label for="#">{{ get_phrase('Group Title') }}</label>
        <input type="text" class="border-0 bg-secondary"  name="name" value="" required placeholder="Enter your page Name">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Group Sub Title') }}</label>
        <input type="text" class="border-0 bg-secondary" name="subtitle" value="" placeholder="Enter your page Name">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('About') }}</label>
        <textarea name="about" class="border-0 bg-secondary content" id="about" cols="30" rows="10" placeholder="About Group"></textarea>
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Status') }}</label>
        <select name="status" id="status" class="form-control border-0 bg-secondary">
            <option value="1">{{ get_phrase('Active') }}</option>
            <option value="0">{{ get_phrase('Deactive') }}</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="#">{{ get_phrase('Update Profile Photo') }}</label>
        <input type="file" name="image" id="image" class="form-control border-0 bg-secondary">
    </div>
    <button type="submit" class="w-100 btn btn-primary">{{ get_phrase('Create Group') }}</button>
</form>


@include('frontend.initialize')