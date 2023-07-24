<div class="paymentWrap d-flex align-items-start flex-wrap">
  <div class="paymentLeft">
    <p class="payment_tab_title pb-30">{{get_phrase('Select payment gateway')}}</p>
    <!-- Tab -->
    <div class="nav flex-md-column flex-row nav-pills payment_modalTab" role="tablist" aria-orientation="vertical">

      @foreach($payment_gateways as $key => $payment_gateway)
      <div class="tabItem" onclick="showPaymentGatewayByAjax('{{$payment_gateway->identifier}}')" id="{{$payment_gateway->identifier}}-tab" data-bs-toggle="pill" data-bs-target="#{{$payment_gateway->identifier}}" role="tab" aria-controls="{{$payment_gateway->identifier}}" aria-selected="true">
        <div class="payment_gateway_option d-flex align-items-center">
          <div class="logo">
            <img width="100px" src="{{get_image('assets/payment/'.$payment_gateway->identifier.'.png')}}" alt="" />
          </div>
          <div class="info">
            <p class="card_no">{{$payment_gateway->title}}</p>
            <p class="card_date"></p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
  <div class="paymentRight">
    <p class="payment_tab_title pb-30">{{get_phrase('Item List')}}</p>
    <div class="payment_table">
      <div class="table-responsive">
        <table class="table eTable eTable-2">
          <tbody>

            @php $total_payable_amount = 0; $counter = 0; @endphp
            @foreach($payment_details['items'] as $key => $item)
              @php $counter++; @endphp
              <tr>
                <td>
                  <div class="dAdmin_info_name">
                    <p><span>#{{$counter}}</span></p>
                  </div>
                </td>
                <td>
                  <div class="dAdmin_info_name min-w-100px">
                    <p>{{$item['title']}}</p>
                  </div>
                </td>
                <td>
                  <div class="dAdmin_info_name min-w-150px text-end">
                    @if($item['discount_percentage'] > 0)
                      <p class="text-dark"><small class="text-muted"><del>{{currency($item['price'])}}</del></small> {{currency($item['discount_price'])}}</p>
                    @else
                      <p>{{currency($item['price'])}}</p>
                    @endif
                  </div>
                </td>
              </tr>
            @endforeach

            @if($payment_details['tax'] > 0)
              <tr>
              <td></td>
              <td>
                <div class="dAdmin_info_name min-w-100px">
                  <p>{{get_phrase('Tax')}}</p>
                </div>
              </td>
              <td>
                <div class="dAdmin_info_name min-w-150px text-end">
                  <p>{{currency($payment_details['tax'])}}</p>
                </div>
              </td>
            </tr>
            @endif
            

            <tr>
              <td></td>
              <td></td>
              <td>
                <div class="dAdmin_info_name min-w-150px text-end">
                  <p><span>{{get_phrase('Grand Total')}}: $25</span></p>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Content -->
    <div class="tab-content">
      <div class="tab-pane fade show active" id="showPaymentGatewayByAjax">
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  function showPaymentGatewayByAjax(identifier){
    $('#showPaymentGatewayByAjax').html('<div class="w-100 text-center my-5"><div class="spinner-border" style="width: 3.5rem; height: 3.5rem;" role="status"><span class="visually-hidden"></span></div></div>');
    $.ajax({
      url: "{{route('payment.show_payment_gateway_by_ajax','')}}/"+identifier,
      success(response){
        $('#showPaymentGatewayByAjax').html(response);
      }
    });
  }
</script>