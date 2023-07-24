<form method="POST" action="{{route('user.ad.payment_configuration', $id)}}">
  @CSRF
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-success text-14px text-center" role="alert">
        {{get_phrase('The advertisement will be charged ____ per day', [currency(get_settings('ad_charge_per_day'))])}}
      </div>

      <div class="alert alert-succes text-center" role="alert">
        <h2 class="ad-total-charged-amount fw-bold">{{currency(0)}}</h2>
        <small>{{get_phrase('Total amount')}}</small>
      </div>

      <div class="mb-3">
        <label for="ad_start_date" class="form-label eForm-label">{{ get_phrase('Start date') }}</label>
        <input type="date" onchange="getAdvertisementTotalAmount(this, '{{$id}}')" class="form-control eForm-control inputDate" id="ad_start_date" name="start_date" placeholder="{{ get_phrase('Start date') }}" required>
      </div>

      <div class="mb-3">
        <label for="ad_end_date" class="form-label eForm-label">{{ get_phrase('End date') }}</label>
        <input type="date" onchange="getAdvertisementTotalAmount(this, '{{$id}}')" class="form-control eForm-control inputDate" id="ad_end_date" name="end_date" placeholder="{{ get_phrase('End date') }}" required>
      </div>

      <div class="mb-3 mt-4">
        <button type="submit" class="btn btn-success w-100 btn-payment-redirect" disabled><i class="bi bi-credit-card"></i> {{get_phrase('Pay To Activate')}}</button>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript">
  function getAdvertisementTotalAmount(elem){
    var adStartDate = $('#ad_start_date').val();
    var adEndDate = $('#ad_end_date').val();
    $.ajax({
      url: '{{route("user.ad.ad_charge_by_daterange")}}',
      data:{start_date:adStartDate, end_date:adEndDate},
      success: function(response){
        $('.ad-total-charged-amount').text('<?php echo currency(''); ?>'+response);
        if(response > 0){
          $('.btn-payment-redirect').attr('disabled', false);
        }else{
          $('.btn-payment-redirect').attr('disabled', true);
        }
      }
    });
  }

  // $(function () {
  //   $('.daterangepicker').daterangepicker();
  // });
</script>