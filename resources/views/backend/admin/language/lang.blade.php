<div class="main_content">

    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Languages') }}</h4>
            </div>

            <div class="export-btn-area">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                {{ get_phrase('Add new language') }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-sm-12 col-lg-12">
        <div class="eSection-wrap-2">
            <!-- Filter area -->
            <div class="table-responsive">
              <table class="table eTable">
                <thead>
                  <tr>
                    <th scope="col">{{ get_phrase('Sl No') }}</th>
                    <th scope="col">{{ get_phrase('Name') }}</th>
                    <th scope="col">{{ get_phrase('Action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $languages as $key => $language )
                      <tr>
                          <th scope="row">
                          <p class="row-number">{{ ++$key }}</p>
                          </th>
                          <td>
                          <div class="dAdmin_info_name min-w-100px">
                              <p><span class="text-capitalize">{{ $language->name }}</span></p>
                          </div>
                          </td>
                          <td>
                            <div class="adminTable-action m-0">
                              <button type="button" class="btn btn-rounded btn-outline-secondary custom_button_action_padding" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                                <li>
                                  <a class="dropdown-item" href="{{route('admin.languages.edit.phrase', $language->name)}}">{{get_phrase('Edit phrase')}}</a>
                                </li>
                                
                                <li>
                                  <a class="dropdown-item" onclick="ajaxModal('{{route('load_modal_content', ['view_path'=>'backend.admin.language.language_edit','language' => $language->name])}}', '{{get_phrase('Edit language')}}')" href="javascript:;">{{get_phrase('Edit language')}}</a>
                                </li>

                                @if($language->name != 'english')
                                  <li>
                                    <a class="dropdown-item" href="#">{{get_phrase('Delete')}}</a>
                                  </li>
                                @endif
                              </ul>
                            </div>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
    <!-- Start Footer -->
    @include('backend.footer')
    <!-- End Footer -->
  </div>


  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ get_phrase('Add Language') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.language.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="language" class="eForm-label">{{ get_phrase('Language') }}</label>
                <input type="text" class="form-control eForm-control" required id="language" name="language" placeholder="Enter your language name">
              </div>
            <button type="submit" class="btn btn-primary">{{get_phrase('Add')}}</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>


