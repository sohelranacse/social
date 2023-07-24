
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Edit your page information') }}</h4>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-md-7">
        <div class="eSection-wrap-2">
            <div class="eForm-layouts">
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <form method="POST" action="{{ route('admin.page.updated', $page_details->id) }}" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="title" class="form-label eForm-label">{{ get_phrase('Page title') }}</label>
                    <input type="text" class="form-control eForm-control" value="{{$page_details->title}}" id="title" name="title" placeholder="Page title">
                  </div>

                  <div class="mb-3">
                      <label for="page_category" class="form-label eForm-label">{{ get_phrase('Select a category') }}</label>
                      <select name="category" class="form-select eForm-control select2" required>
                        <option>{{get_phrase('Select a category')}}</option>
                        @foreach(DB::table('pagecategories')->get() as $category)
                          <option value="{{$category->id}}" @if($page_details->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="mb-3">
                      <label for="description" class="form-label eForm-label">{{ get_phrase('Page details') }}</label>
                      <textarea id="description" name="description" class="content">{{$page_details->description}}</textarea>
                  </div>

                  <div class="mb-3">
                      <label for="logo" class="form-label eForm-label">{{ get_phrase('Logo') }}</label>
                      <input id="logo" class="form-control eForm-control-file" type="file" name="logo">
                  </div>

                  <div class="mb-3">
                      <label for="coverphoto" class="form-label eForm-label">{{ get_phrase('Cover photo') }}</label>
                      <input id="coverphoto" class="form-control eForm-control-file" type="file" name="coverphoto">
                  </div>
                  
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



