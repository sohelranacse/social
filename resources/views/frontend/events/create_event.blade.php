
    <form class="ajaxForm event-form" action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @if (isset($group_id))
            <input type="hidden" value="{{ $group_id }}" name="group_id" />
        @endif
        <div class="entry-header d-flex mb-10 justify-content-between">
            <div class="ava-info d-flex align-items-center">
                <div class="flex-shrink-0">
                    <img src="{{get_user_image(Auth()->user()->photo, 'optimized')}}" class="user-round user_image_show_on_modal" alt="...">
                </div>
                <div class="ava-desc ms-2">
                    <h3 class="mb-0 h6">{{ Auth::user()->name }}</h3>
                </div>
            </div>
            <div class="post-controls dropdown">
                <select name="privacy" id="privacy" class="form-control bg-secondary">
                    <option value="public">{{ get_phrase('Public')}}</option>
                    <option value="private">{{ get_phrase('Private')}}</option>
                </select>
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="#">{{ get_phrase('Event Name') }}</label>
            <input type="text" name="eventname" placeholder="Enter your event name">
        </div>
        <div class="row">
            <div class="form-group col-md-6 col-lg-6 col-sm-12">
                <label for="#">{{ get_phrase('Event Date') }}</label>
                <input type="date" name="eventdate" placeholder="Event Date">
            </div>
            <div class="form-group col-md-6 col-lg-6 col-sm-12">
                <label for="#">{{ get_phrase('Event Time') }}</label>
                <input type="time" name="eventtime" placeholder="Event Time">
            </div>
        </div>
        <div class="form-group">
            <label for="#">{{ get_phrase('Location') }}</label>
            <input type="text" name="eventlocation" placeholder="Enter your location">
        </div>
        <div class="form-group">
            <label for="#">{{ get_phrase('Event Description') }}</label>
            <textarea name="description" class="content" id="description" cols="30" rows="10" placeholder="Description"> </textarea>
        </div>
        <div class="form-group">
            <label for="#">{{ get_phrase('Cover Photo') }}</label>
            <div class="mb-3 mt-4 text-center">
                <input type="file" id="coverphoto" name="coverphoto" class="form-control w-100" name="profile_photo" accept="image/*">
            </div>
        </div>
        
        <div class="inline-btn mt-5">
            <button class="btn btn-primary w-100" type="submit" onclick="document.getElementById('description').value=CKEDITOR.instances.description.getData(); CKEDITOR.instances.description.destroy()">{{get_phrase('Create Event')}}</button>
        </div>
    </form>  

@include('frontend.initialize')