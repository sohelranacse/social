
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Payment gateways') }}</h4>
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
                  <th scope="col">{{ get_phrase('Payment Gateway') }}</th>
                  <th scope="col">{{ get_phrase('Currency') }}</th>
                  <th scope="col">{{ get_phrase('Environment') }}</th>
                  <th scope="col">{{ get_phrase('Status') }}</th>
                  <th scope="col" class="text-center">{{ get_phrase('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($payment_gateways as $key => $payment_gateway )
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$payment_gateway->title}}</td>
                        <td><?php echo ellipsis(script_checker($payment_gateway->currency), 50); ?></td>
                        <td>
                        	@if($payment_gateway->test_mode == 1)
	                            <span class="badge bg-warning">{{get_phrase('Test Mode')}}</span>
	                        @else
	                            <span class="badge bg-success">{{get_phrase('Live Mode')}}</span>
	                        @endif
                        </td>
                        <td>
                          @if($payment_gateway->status == 1)
                            <span class="badge bg-success">{{get_phrase('Active')}}</span>
                          @else
                            <span class="badge bg-secondary">{{get_phrase('Deactive')}}</span>
                          @endif
                        </td>
                        
                        <td class="text-center">
                          <div class="adminTable-action me-auto">
                            <button type="button" class="eBtn eBtn-black dropdown-toggle table-action-btn-2" data-bs-toggle="dropdown" aria-expanded="false">
                              {{get_phrase('Actions')}}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                              <li><a class="dropdown-item" href="{{route('admin.payment_gateway.edit', $payment_gateway->id)}}">{{get_phrase('Edit')}}</a></li>

	                            @if($payment_gateway->status == 1)
	                              <li><a class="dropdown-item" onclick="return confirm('{{get_phrase('Are you sure want to change status?')}}')" href="{{route('admin.payment_gateway.status', $payment_gateway->id)}}">{{get_phrase('Deactive')}}</a></li>
	                            @else
	                              <li><a class="dropdown-item" onclick="return confirm('{{get_phrase('Are you sure want to change status?')}}')" href="{{route('admin.payment_gateway.status', $payment_gateway->id)}}">{{get_phrase('Active')}}</a></li>
	                            @endif

	                            @if($payment_gateway->test_mode == 1)
                                  <li><a class="dropdown-item" onclick="return confirm('{{get_phrase('Are you sure want to change environment?')}}')" href="{{route('admin.payment_gateway.environment', $payment_gateway->id)}}">{{get_phrase('Activate live mode')}}</a></li>
                                @else
                                  <li><a class="dropdown-item" onclick="return confirm('{{get_phrase('Are you sure want to change environment?')}}')" href="{{route('admin.payment_gateway.environment', $payment_gateway->id)}}">{{get_phrase('Activate test mode')}}</a></li>
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
    <!-- End Admin area -->

   
    <!-- Start Footer -->
    @include('backend.footer')
    <!-- End Footer -->
  </div>



