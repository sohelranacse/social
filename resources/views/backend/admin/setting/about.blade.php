
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Update Custom Pages Information') }}</h4>
              
            </div>
            <div class="export-btn-area">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-12">
        <div class="eSection-wrap-2">
          <div class="eForm-layouts">
            <form method="POST" action="{{ route('admin.about.page.data.update',$about->setting_id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3 mt-2">
                    <label for="about" class="form-label eForm-label mt-1">{{ get_phrase('About Page Description') }}</label>
                    <textarea name="about" id="about" class="form-control eForm-control content"  placeholder="About Us">{{ $about->description }}</textarea>
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

    
    <div class="row mt-5">
      <div class="col-12">
        <div class="eSection-wrap-2">
          <div class="eForm-layouts">
            <form method="POST" action="{{ route('admin.privacy.page.data.update',$privacy->setting_id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="privacy" class="form-label eForm-label">{{ get_phrase('Privacy Page Description') }}</label>
                    <textarea name="privacy" id="privacy" class="form-control eForm-control content" placeholder="Privacy">{{ $privacy->description }}</textarea>
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

      <div class="row mt-5">
        <div class="col-12">
          <div class="eSection-wrap-2">
            <div class="eForm-layouts">
              <form method="POST" action="{{ route('admin.term.page.data.update',$term->setting_id) }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mb-3">
                      <label for="term" class="form-label eForm-label">{{ get_phrase('Term and Condition Page Description') }}</label>
                      <textarea name="term" id="term" class="form-control eForm-control content"  placeholder="About Us">{{ $term->description }}</textarea>
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
    



    <!-- Start Footer -->
    @include('backend.footer')
    <!-- End Footer -->
  </div>




