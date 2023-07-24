<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
        if(isset($common_path) && $common_path == 'global'){
            $folder = 'global';
        }elseif(auth()->user()->user_role == 'admin'){
            $folder = 'admin';
        }elseif(auth()->user()->user_role == 'general'){
            $folder = 'user';
        }
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    ?>
    <title><?php echo e($system_name); ?></title>
    <!-- all the meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- CSRF Token for ajax for submission -->
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />
    <!-- all the css files -->
    <link rel="shortcut icon" href="<?php echo e(get_system_logo_favicon($system_favicon,'favicon')); ?>" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/vendors/bootstrap-5.1.3/css/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/fontawesome/all.min.css')); ?>">
    <!--Custom css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/css/swiper-bundle.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/css/custom.css')); ?>" />
    <!-- Datepicker css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/daterangepicker.css')); ?>" />

    <link href="<?php echo e(asset('assets/frontend/css/tagify.css')); ?>" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/summernote-0.8.18-dist/summernote-lite.min.css')); ?>" />
    <!-- Select2 css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/css/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/jquery.dataTables.min.css')); ?>" />

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/vendors/bootstrap-icons-1.8.1/bootstrap-icons.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/backend/css/own.css')); ?>" />
    <!--Main Jquery-->
    <script src="<?php echo e(asset('assets/backend/vendors/jquery/jquery-3.6.0.min.js')); ?>"></script>
  </head>

  <body>
    <?php echo $__env->make('backend.'.$folder.'.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="home-section">
      <div class="home-content">
        <?php echo $__env->make('backend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('backend.'.$folder.'.'.$view_path, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('backend.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('backend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </section>
    <!--Bootstrap bundle with popper-->
    <script src="<?php echo e(asset('assets/backend/vendors/bootstrap-5.1.3/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/swiper-bundle.min.js')); ?>"></script>
    <!-- Datepicker js -->
    <script src="<?php echo e(asset('assets/backend/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/daterangepicker.min.js')); ?>"></script>
    <!-- Select2 js -->
    <script src="<?php echo e(asset('assets/backend/js/select2.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/frontend/js/jQuery.tagify.min.js')); ?>"></script>


    <script src="<?php echo e(asset('assets/backend/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert2@11.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/frontend/summernote-0.8.18-dist/summernote-lite.min.js')); ?>"></script>

    <!--Custom Script-->
    <script src="<?php echo e(asset('assets/backend/js/chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/script.js')); ?>"></script>


    <script>
        "use strict";

        $(document).ready( function () {

            $('#myTable').DataTable();
            <?php echo $__env->yieldContent('custom_js'); ?>
            $('.content').summernote({
                height: '250px',
                toolbar: [
                    ['color', ['color']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol']],
                    ['table', ['table']],
                    ['insert', ['link']]
                ]
            });

            //Initialize tagify
            $('[name=tag]').tagify({
                duplicates :false
            });

            //Initialize date picker
            $('.inputDate').daterangepicker(
                {
                  singleDatePicker: true,
                  showDropdowns: true,
                  minYear: 1901,
                  maxYear: parseInt(moment().format("YYYY"), 10),
                },
                function (start, end, label) {
                  var years = moment().diff(start, "years");
                }
            );

        } );

        function confirmActionAlert(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want To Delete!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
              })
        }

        <?php echo $__env->yieldContent('backend_custom_js'); ?>
    </script>

    
  </body>
</html>
<?php /**PATH D:\xampp\htdocs\social\resources\views/backend/index.blade.php ENDPATH**/ ?>