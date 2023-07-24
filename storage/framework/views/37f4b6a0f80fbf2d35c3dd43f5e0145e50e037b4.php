
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Update zoom api keys')); ?></h4>
              
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
            <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.live-video.update')); ?>">
                
                <?php echo csrf_field(); ?>
                <div class="fpb-7">
                    <label for="api_key" class="eForm-label"><?php echo e(get_phrase('API key')); ?></label>
                    <input type="text" class="form-control eForm-control" value="<?php echo e(get_settings('zoom_configuration', true)['api_key']); ?>" id="api_key" name="api_key" required="">
                </div>
                <div class="fpb-7">
                    <label for="api_secret" class="eForm-label"><?php echo e(get_phrase('API secret')); ?></small></label>
                        <input type="text" class="form-control eForm-control" value="<?php echo e(get_settings('zoom_configuration', true)['api_secret']); ?>" id="api_secret" name="api_secret" required="">
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



<?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/setting/live_video.blade.php ENDPATH**/ ?>