<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Creativeitem Software Installation" />
	<meta name="author" content="Creativeitem" />
	<title><?php echo e(__('Installation').' | '.__('Sociopro')); ?></title>
	
	<!-- CSRF Token for ajax for submission -->
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" href="<?php echo e(asset('storage/logo/favicon/favicon.png')); ?>" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/fontawesome/all.min.css')); ?>">
    <!-- CSS Library -->

    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/owl.carousel.min.css')); ?>">

    <!-- Style css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/plyr/plyr.css')); ?>">
    <link href="<?php echo e(asset('assets/frontend/leafletjs/leaflet.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/frontend/css/plyr_cdn_dw.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/frontend/css/tagify.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/frontend/uploader/jquery.uploader.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/frontend/css/jquery-rbox.css')); ?>" rel="stylesheet">

   <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/summernote-0.8.18-dist/summernote-lite.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/style.css')); ?>">
    <link href="<?php echo e(asset('assets/frontend/toaster/toaster.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/gallery/justifiedGallery.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/own.css')); ?>">
    
    <script src="<?php echo e(asset('assets/frontend/js/jquery-3.6.0.min.js')); ?>"></script>


</head>
<body class="page-body">

<div class="page-container horizontal-menu">

	<header class="navbar navbar-fixed-top ins-one bg-dark">
		<div class="container">
			<div class="navbar-inner">
				<!-- logo -->
				<div class="navbar-brand">
					<a href="#">
						<img width="130px" src="<?php echo e(asset('storage')); ?>/logo/light/logo.png" alt="">
					</a>
					<span class="logo_name ms-4"><?php echo e(__('Installation')); ?></span>
				</div>
			</div>
		</div>
	</header>
	<div class="main_content py-4">
		<?php echo $__env->yieldContent('content'); ?>
	</div>

	<!--Javascript
    ========================================================-->
    <script src="<?php echo e(asset('assets/frontend/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/venobox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/jquery.datepicker.min.js')); ?>"></script>

   
    <script src="<?php echo e(asset('assets/frontend/js/jquery.nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/plyr/plyr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/jquery-form/jquery.form.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/frontend/leafletjs/leaflet.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/leafletjs/leaflet-search.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/toaster/toaster.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/frontend/gallery/jquery.justifiedGallery.min.js')); ?>"></script>
    

    <script src="<?php echo e(asset('assets/frontend/js/jQuery.tagify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/jquery-rbox.js')); ?>"></script>


    <script src="<?php echo e(asset('assets/frontend/js/plyr_cdn_dw.js')); ?>"></script>

    <script src="<?php echo e(asset('js/share.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/frontend/uploader/jquery.uploader.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/frontend/summernote-0.8.18-dist/summernote-lite.min.js')); ?>"></script>


</body>
</html><?php /**PATH D:\xampp\htdocs\social\resources\views/install/index.blade.php ENDPATH**/ ?>