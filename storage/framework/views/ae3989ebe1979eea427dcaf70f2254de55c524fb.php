
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Add a new user')); ?></h4>
            </div>
            <div class="export-btn-area">
              <a href="<?php echo e(route('admin.users')); ?>" class="export_btn" data-bs-toggle="tooltip" data-bs-placement="top"
              data-bs-custom-class="custom-tooltip"
              data-bs-title="<?php echo e(get_phrase('Back')); ?>"><?php echo e(get_phrase('Back')); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-6">
        <div class="eSection-wrap-2">
          <div class="eForm-layouts">
            <form method="POST" action="<?php echo e(route('admin.user.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                  <label for="name" class="form-label eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                  <input type="text" class="form-control eForm-control" id="name" name="name" placeholder="<?php echo e(get_phrase('Name')); ?>">
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label eForm-label"><?php echo e(get_phrase('Email')); ?></label>
                  <input type="email" class="form-control eForm-control" id="email" name="email" placeholder="<?php echo e(get_phrase('Email address')); ?>">
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label eForm-label"><?php echo e(get_phrase('Password')); ?></label>
                  <input type="password" class="form-control eForm-control" id="password" name="password" placeholder="<?php echo e(get_phrase('Password')); ?>">
                </div>


                <div class="mb-3">
                  <label for="phone" class="form-label eForm-label"><?php echo e(get_phrase('Phone')); ?></label>
                  <input type="text" class="form-control eForm-control" id="phone" name="phone" placeholder="<?php echo e(get_phrase('Phone')); ?>">
                </div>

                <div class="mb-3">
                  <label for="address" class="form-label eForm-label"><?php echo e(get_phrase('Address')); ?></label>
                  <input type="text" class="form-control eForm-control" id="address" name="address" placeholder="<?php echo e(get_phrase('Address')); ?>">
                </div>

                <div class="mb-3">
                  <label for="gender" class="form-label eForm-label"><?php echo e(get_phrase('Gender')); ?></label><br>
                  <input type="radio" id="male" name="gender" value="male"> <label for="male"><?php echo e(get_phrase('Male')); ?></label> 
                  <input type="radio" id="female" name="gender" value="female"> <label for="female"><?php echo e(get_phrase('Female')); ?></label>
                </div>

                <div class="mb-3">
                  <label for="photo" class="form-label eForm-label"><?php echo e(get_phrase('Photo')); ?></label>
                  <input type="file" class="form-control eForm-control" id="photo" name="photo" placeholder="<?php echo e(get_phrase('Photo')); ?>">
                </div>

                <div class="mb-3">
                  <label for="date_of_birth" class="form-label eForm-label"><?php echo e(get_phrase('Date of birth')); ?></label>
                  <input type="text" class="form-control eForm-control inputDate" id="date_of_birth" name="date_of_birth" placeholder="<?php echo e(get_phrase('Date of birth')); ?>" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="bio" class="form-label eForm-label"><?php echo e(get_phrase('Bio')); ?></label>
                    <textarea name="bio" id="bio" class="form-control eForm-control" placeholder="Bio"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary"><?php echo e(get_phrase('Submit')); ?></button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Footer -->
    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->
  </div>




<?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/users/add.blade.php ENDPATH**/ ?>