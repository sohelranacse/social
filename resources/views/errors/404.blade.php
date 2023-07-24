<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    @endphp
    <title>{{ $system_name }}</title>

    <!-- CSRF Token for ajax for submission -->
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" href="{{ get_system_logo_favicon($system_favicon,'favicon') }}" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome/all.min.css')}}">
    <!-- CSS Library -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/own.css')}}">
</head>

<body>

	<!-- 404 Area Start -->
	<section class="error-404-area">
	    <div class="container-xxl">
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="error-box">
	                    <div class="error-content">
	                        <img src="{{asset('storage/images/404-image.png')}}" alt="image">
	                         <h1>{{get_phrase('404 page not found')}}</h1>
	                        <p>{{get_phrase('This page is not available, please provide a valid URL')}}</p>

	                        <a class="btn error-btn pe-4" href="{{url('/')}}"> <i class="fas fa-arrow-left px-2"></i> {{get_phrase('Back')}}</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- 404 Area End -->
    
    <!--Javascript-->
    <script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>


