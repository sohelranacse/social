
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Edit Sponsor Post') }}</h4>
            </div>
            <div class="export-btn-area">
              <a href="{{ route('admin.view.sponsor') }}" class="export_btn">{{ get_phrase('View') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-12">
        <div class="eSection-wrap-2">
            <div class="row">
                <div class="col-md-6 col-md-6 col-sm-6">
                    <div class="eForm-layouts">
                      <form method="POST" action="{{ route('admin.update.sponsor',$sponsor->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label for="name" class="form-label eForm-label">{{ get_phrase('Title') }}</label>
                              <input type="text" class="form-control eForm-control" id="name" value="{{ $sponsor->name }}" name="name" placeholder="Title">
                            </div>
                            <div class="mb-3">
                              <label for="image" class="form-label eForm-label">{{ get_phrase('Image') }}</label>
                              <input type="file" class="form-control eForm-control" id="image"  name="image" placeholder="Title">
                            </div>
                            
                            <div class="mb-3">
                              <label for="">{{ get_phrase('Previous Uploaded File') }}</label> <br>
                              <img height="70" width="100" src="{{ get_sponsor_image($sponsor->image,"thumbnail") }}" alt="">
                            </div>

                            <div class="mb-3">
                              <label for="ext_url" class="form-label eForm-label">{{ get_phrase('URL') }}</label>
                              <input type="url" class="form-control eForm-control" id="ext_url" value="{{ $sponsor->ext_url }}" name="ext_url" placeholder="URL">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="description" class="form-label eForm-label">{{ get_phrase('Description') }} <small>{{ get_phrase('(50 Character Show In Front End)') }}</small> </label>
                                <textarea name="description" id="description" class="form-control eForm-control content" placeholder="Description">{{ $sponsor->description }}</textarea>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <button type="submit" class="btn btn-primary">{{ get_phrase('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- Start Footer -->
   @include('backend.footer')
    <!-- End Footer -->
  </div>

  
