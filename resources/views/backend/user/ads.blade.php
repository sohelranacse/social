
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Your ads') }}</h4>
              
            </div>

            <div class="export-btn-area">
              <a href="{{ route('user.ad.create') }}" class="export_btn"><i class="fas fa-plus me-2"></i> {{ get_phrase('Create a new Ad') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-12">
        <div class="eSection-wrap-2">
          <!-- Filter area -->

          <div class="table-responsive">
            <table class="table eTable " id="">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">{{ get_phrase('Image') }}</th>
                  <th scope="col">{{ get_phrase('Title') }}</th>
                  <th scope="col">{{ get_phrase('Start Date') }}</th>
                  <th scope="col">{{ get_phrase('End Date') }}</th>
                  <th scope="col">{{ get_phrase('Status') }}</th>
                  <th scope="col" class="text-center">{{ get_phrase('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $ads as $key => $ad )
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                          <a href="{{$ad->ext_url}}" target="_blank"><img class="image-fluid" width="80px" src="{{get_image('storage/sponsor/thumbnail/'.$ad->image)}}"></a>
                        </td>
                        <td>{{ $ad->name }}</td>
                        <td>{{date_formatter($ad->start_date)}}</td>
                        <td>{{date_formatter($ad->end_date)}}</td>
                        <td>
                          @if($ad->status != 1)
                            <span class="badge bg-secondary">{{get_phrase('Disabled by administrator')}}</span>
                          @elseif(strtotime($ad->start_date) == strtotime($ad->end_date))
                            <span class="badge bg-primary">{{get_phrase('Not yet published')}}</span>
                          @elseif(strtotime($ad->end_date) < time())
                            <span class="badge bg-danger">{{get_phrase('Expired')}}</span>
                          @else
                            <span class="badge bg-success">{{get_phrase('Active')}}</span>
                          @endif
                        </td>
                        
                        <td class="text-center">
                          <div class="adminTable-action">
                            <button type="button" class="eBtn eBtn-black dropdown-toggle table-action-btn-2" data-bs-toggle="dropdown" aria-expanded="false">
                              {{get_phrase('Actions')}}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                              
                              <li><a class="dropdown-item" href="{{route('user.ad.edit', $ad->id)}}">{{get_phrase('Edit')}}</a></li>

                              @if($ad->expiry_date < time() && $ad->status == 1)
                                <li>
                                  <a href="javascript:;" class="dropdown-item" onclick="ajaxModal('{{route('load_modal_content', ['backend.user.ad_activation', 'id' => $ad->id])}}', '{{get_phrase('Ad activation')}}')">Active</a>
                                </li>
                              @endif

                              <li><a class="dropdown-item" onclick="return confirm('{{get_phrase('Are You Sure Want To Delete?')}}')" href="{{route('user.ad.delete', $ad->id)}}">{{get_phrase('Delete')}}</a></li>
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
    <!-- End Admin area -->

   
    <!-- Start Footer -->
    @include('backend.footer')
    <!-- End Footer -->
  </div>



