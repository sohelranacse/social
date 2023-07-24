
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4>{{ get_phrase('Payment histories') }}</h4>
              
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
                  <th scope="col">{{ get_phrase('Amount') }}</th>
                  <th scope="col">{{ get_phrase('Payment date') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $payment_histories as $key => $payment_historie )
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ $payment_historie->amount }} {{$payment_historie->currency}}</td>
                        <td>{{date_formatter($payment_historie->created_at)}}</td>
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



