
<?php echo $__env->make('auth.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

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
                <div class="login-txt">
                    <h3 class="text-center"><?php echo e(get_phrase('Reset password')); ?></h3>
                    <form action="<?php echo e(route('user.password.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group form-pass">
                            <label for="#"><?php echo e(get_phrase('Current Password')); ?></label>
                            <input type="text" name="prevpass" placeholder="<?php echo e(get_phrase('8 Symbols at least')); ?>">
                        </div>
                        <p class="text-danger"><?php echo e($errors->first('prevpass')); ?></p>
                        <div class="form-group form-eye">
                            <label for="#"><?php echo e(get_phrase('Password')); ?></label>
                            <input type="password" name="password" placeholder="<?php echo e(get_phrase('New Password')); ?>">
                        </div>

                        <div class="form-group form-eye">
                            <label for="#"><?php echo e(get_phrase('Confirm Password')); ?></label>
                            <input type="password" name="password_confirmation" placeholder="<?php echo e(get_phrase('Confirm Password')); ?>">
                        </div>
                        <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                        </div>
                        <input class="btn btn-primary my-3 btn-sm" type="submit" value="<?php echo e(get_phrase('Update Password')); ?>">

                    </form>

                </div>
            </div>
        </div>

    </div> <!-- container end -->
</main>
<!-- Main End -->

<?php echo $__env->make('auth.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/user/change-password.blade.php ENDPATH**/ ?>