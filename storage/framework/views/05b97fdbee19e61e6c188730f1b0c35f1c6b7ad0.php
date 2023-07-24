<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    ?>
    <title><?php echo e($system_name); ?></title>

    <!-- CSRF Token for ajax for submission -->
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" href="<?php echo e(get_system_logo_favicon($system_favicon,'favicon')); ?>" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/fontawesome/all.min.css')); ?>">
    <!-- CSS Library -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/own.css')); ?>">
</head>

<body>

	<!-- 404 Area Start -->
	<section class="error-404-area">
	    <div class="container-xxl">
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="error-box">
	                    <div class="error-content">
	                        <img src="<?php echo e(asset('storage/images/404-image.png')); ?>" alt="image">
	                         <h1><?php echo e(get_phrase('404 page not found')); ?></h1>
	                        <p><?php echo e(get_phrase('This page is not available, please provide a valid URL')); ?></p>

	                        <a class="btn error-btn pe-4" href="<?php echo e(url('/')); ?>"> <i class="fas fa-arrow-left px-2"></i> <?php echo e(get_phrase('Back')); ?></a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- 404 Area End -->
    
    <!--Javascript-->
    <script src="<?php echo e(asset('assets/frontend/js/bootstrap.bundle.min.js')); ?>"></script>
</body>

</html>


<?php /**PATH D:\xampp\htdocs\social\resources\views/errors/404.blade.php ENDPATH**/ ?>