
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Update SMTP Information')); ?></h4>
              
            </div>
            <div class="export-btn-area">
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="eSection-wrap-2">
                  <div class="eForm-layouts">
                    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.smtp.settings.view.save',$smtp_settings->setting_id)); ?>">
                        
                        <?php echo csrf_field(); ?>
                        <div class="fpb-7">
                            <label for="smtp_protocol" class="eForm-label"><?php echo e(get_phrase('Protocol')); ?> <small>(smtp or ssmtp or mail)</small> </label>
                            <input type="text" class="form-control eForm-control" value="<?php echo e($smptData->smtp_protocol); ?>" id="smtp_protocol" name="smtp_protocol" required="">
                        </div>
                        <div class="fpb-7">
                            <label for="smtp_crypto" class="eForm-label"><?php echo e(get_phrase('Smtp crypto')); ?> <small>(ssl or tls)</small></label>
                             <input type="text" class="form-control eForm-control" value="<?php echo e($smptData->smtp_crypto); ?>" id="smtp_crypto" name="smtp_crypto" required="">
                        </div>
                        <div class="fpb-7">
                            <label for="smtp_host" class="eForm-label"><?php echo e(get_phrase('Smtp host')); ?></label>
                            <input type="text" class="form-control eForm-control" value="<?php echo e($smptData->smtp_host); ?>" id="smtp_host" name="smtp_host" required="">
                        </div>
                        <div class="fpb-7">
                            <label for="smtp_port" class="eForm-label"><?php echo e(get_phrase('Smtp port')); ?></label>
                            <input type="text" class="form-control eForm-control" value="<?php echo e($smptData->smtp_port); ?>" id="smtp_port" name="smtp_port" required="">
                        </div>
                        <div class="fpb-7">
                            <label for="smtp_user" class="eForm-label"><?php echo e(get_phrase('Smtp username')); ?></label>
                            <input type="text" class="form-control eForm-control" value="<?php echo e($smptData->smtp_user); ?>" id="smtp_user" name="smtp_user" required="">
                        </div>
                        <div class="fpb-7">
                            <label for="smtp_pass" class="eForm-label"><?php echo e(get_phrase('Smtp password')); ?></label>
                            <input type="text" class="form-control eForm-control" value="<?php echo e($smptData->smtp_pass); ?>" id="smtp_pass" name="smtp_pass" required="">
                        </div>
                        <div class="fpb-7 pt-2">
                            <button type="submit" class="btn-form"><?php echo e(get_phrase('Save')); ?></button>
                        </div>
                    </form>
                  </div>
        </div>
      </div>
    </div>
    <!-- Start Footer -->
    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->
  </div>



<?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/setting/smtp.blade.php ENDPATH**/ ?>