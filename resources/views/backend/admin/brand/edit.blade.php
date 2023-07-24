
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Product Brand Edit') }}</h4>
              
            </div>
            <div class="export-btn-area">
              <a href="{{ route('admin.view.product.brand') }}" class="export_btn">{{ get_phrase('View') }}</a>
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
                <div class="col-md-6 col-md-6 col-sm-12">
                  <div class="eForm-layouts">
                    <form method="POST" action="{{ route('admin.update.product.brand',$brand->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="brand" class="form-label eForm-label">{{ get_phrase('Product Brand') }}</label>
                          <input type="text" class="form-control eForm-control" id="brand" value="{{ $brand->name }}" name="brand" placeholder="Brand">
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



