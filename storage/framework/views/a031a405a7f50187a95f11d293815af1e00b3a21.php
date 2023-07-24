
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Update Custom Pages Information')); ?></h4>
              
            </div>
            <div class="export-btn-area">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-12">
        <div class="eSection-wrap-2">
          <div class="eForm-layouts">
            <form method="POST" action="<?php echo e(route('admin.about.page.data.update',$about->setting_id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3 mt-2">
                    <label for="about" class="form-label eForm-label mt-1"><?php echo e(get_phrase('About Page Description')); ?></label>
                    <textarea name="about" id="about" class="form-control eForm-control content"  placeholder="About Us"><?php echo e($about->description); ?></textarea>
                </div>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <button type="submit" class="btn btn-primary"><?php echo e(get_phrase('Submit')); ?></button>
            </form>
          </div>
        </div>
      </div>
    </div>

    
    <div class="row mt-5">
      <div class="col-12">
        <div class="eSection-wrap-2">
          <div class="eForm-layouts">
            <form method="POST" action="<?php echo e(route('admin.privacy.page.data.update',$privacy->setting_id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3">
                    <label for="privacy" class="form-label eForm-label"><?php echo e(get_phrase('Privacy Page Description')); ?></label>
                    <textarea name="privacy" id="privacy" class="form-control eForm-control content" placeholder="Privacy"><?php echo e($privacy->description); ?></textarea>
                </div>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <button type="submit" class="btn btn-primary"><?php echo e(get_phrase('Submit')); ?></button>
            </form>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-12">
          <div class="eSection-wrap-2">
            <div class="eForm-layouts">
              <form method="POST" action="<?php echo e(route('admin.term.page.data.update',$term->setting_id)); ?>" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="form-group mb-3">
                      <label for="term" class="form-label eForm-label"><?php echo e(get_phrase('Term and Condition Page Description')); ?></label>
                      <textarea name="term" id="term" class="form-control eForm-control content"  placeholder="About Us"><?php echo e($term->description); ?></textarea>
                  </div>
                  <?php if($errors->any()): ?>
                      <div class="alert alert-danger">
                          <ul>
                              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><?php echo e($error); ?></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                      </div>
                  <?php endif; ?>
                  
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




<?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/setting/about.blade.php ENDPATH**/ ?>