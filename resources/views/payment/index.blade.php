<!DOCTYPE html>
<html lang="en">
  <head>
    @php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    @endphp
    <title>{{ $system_name }}</title>
    <!-- all the meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- CSRF Token for ajax for submission -->
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <!-- all the css files -->
    <link rel="shortcut icon" href="{{ get_system_logo_favicon($system_favicon,'favicon') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/bootstrap-5.1.3/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/bootstrap-icons-1.8.1/bootstrap-icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/own.css') }}" />
    <!--Main Jquery-->
    <script src="{{ asset('assets/backend/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
  </head>

  <body class="pt-5">
    <div class="main_content paymentContent" style="min-height: calc(100% - 50px); margin-top: 0px !important;">
      <div class="paymentHeader d-flex justify-content-between align-items-center">
        <h5 class="title">{{get_phrase('Order summary')}}</h5>
        <a href="{{$payment_details['cancel_url']}}" class="btn-close"></a>
      </div>
      @include('payment.payment_gateway')
    </div>
    <!--Bootstrap bundle with popper-->
    <script src="{{ asset('assets/backend/vendors/bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/swiper-bundle.min.js') }}"></script>
    <!-- Datepicker js -->
    <script src="{{ asset('assets/backend/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sweetalert2@11.js') }}"></script>

  </body>
</html>