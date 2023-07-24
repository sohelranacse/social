<?php echo $__env->make('auth.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style type="text/css">
        .font-family-serif{
            font-family: serif;
        }
    </style>
    <!-- Main Start -->
    <main class="main my-4 p-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="login-img">
                        <img class="img-fluid" src="<?php echo e(asset('assets/frontend/images/login.png')); ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-txt ms-0 ms-lg-5 text-center fs-5 w-100 mb-20 fw-bold font-family-serif">
                        <?php echo e(get_phrase('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?>

                    </div>
                    
                    

                    <div class="ms-0 ms-lg-5 my-5">

                    <?php if(session('status') == 'verification-link-sent'): ?>
                        <div class="alert alert-success text-center">
                            <?php echo e(get_phrase('A new verification link has been sent to the email address you provided during registration.')); ?>

                        </div>
                    <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                            <?php echo csrf_field(); ?>

                            <div>
                                <button type="submit" class="btn btn-primary w-100 p-10px rounded-10px"><?php echo e(get_phrase('Resend Verification Email')); ?></button>
                            </div>
                        </form>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>

                            <button type="submit" class="btn btn-primary w-100 my-3 p-10px rounded-10px">
                                <?php echo e(get_phrase('Log Out')); ?>

                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- container end -->
    </main>
    <!-- Main End -->
<?php echo $__env->make('auth.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\xampp\htdocs\social\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>