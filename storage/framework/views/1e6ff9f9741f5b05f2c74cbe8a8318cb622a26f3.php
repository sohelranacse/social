<div class="main_content">
  <div class="mainSection-title">
      <div class="row">
          <div class="col-12">
              <div class="d-flex justify-content-between align-items-center">
                  <h4><?php echo e(get_phrase('About this application')); ?></h4>
              </div>
          </div>
      </div>
  </div>

  <?php $curl_enabled = function_exists('curl_version'); ?>
    
    <div class="row justify-content-center mt-4">
      <div class="col-xl-8">
        <div class="eSection-wrap">
          <div class="row">
              <div class="col-12 p-4">

                  <p class="border-bottom mb-2 pb-2 text-13px">
                    <i class="bi bi-arrow-right-square me-3"></i> <?php echo e(get_phrase('Software version')); ?>

                    <span class="float-end"><?php echo e(get_settings('version')); ?></span>
                  </p>
                  <p class="border-bottom mb-2 pb-2 text-13px">
                    <i class="bi bi-arrow-right-square me-3"></i> <?php echo e(get_phrase('Check update')); ?>

                    <span class="float-end">
                        <a class="about-sc-one" href="https://codecanyon.net/user/creativeitem/portfolio"
                          target="_blank">
                            <i class="bi bi-telegram"></i>
                              <?php echo e(get_phrase('Check update')); ?>

                        </a>
                    </span>
                  </p>
                  <p class="border-bottom mb-2 pb-2 text-13px">
                    <i class="bi bi-arrow-right-square me-3"></i> <?php echo e(get_phrase('PHP version')); ?>

                    <span class="float-end"><?php echo e(phpversion()); ?></span>
                  </p>
                  <p class="border-bottom mb-2 pb-2 text-13px">
                    <i class="bi bi-arrow-right-square me-3"></i> <?php echo e(get_phrase('Curl enable')); ?>

                    <span class="float-end">
                      <?php echo $curl_enabled ? '<span class="badge bg-success">'.get_phrase('Enabled').'</span>' : '<span class="badge badge-danger">'.get_phrase('disabled').'</span>'; ?>
                    </span>
                  </p>

                  <p class="border-bottom mb-2 pb-2 text-13px">
                    <i class="bi bi-arrow-right-square me-3"></i> <?php echo e(get_phrase('Purchase code')); ?>

                    <span class="float-end">CodeGood.Net</span>
                  </p>

                  <p class="border-bottom mb-2 pb-2 text-13px">
                    <i class="bi bi-arrow-right-square me-3"></i> <?php echo e(get_phrase('Product license')); ?>

                    <?php if($application_details['product_license'] == 'valid'): ?>
                      <span class="float-end badge bg-success text-capitalize"><?php echo e(get_phrase($application_details['product_license'])); ?></span>
                    <?php else: ?>
                      <span class="float-end badge bg-danger mt-1 text-capitalize"><?php echo e(get_phrase($application_details['product_license'])); ?></span>
                      <button class="btn btn-primary float-end me-2 py-0 text-13px" data-bs-toggle="modal" data-bs-target="#purchasecodeModal"><?php echo e(get_phrase('Enter valid purchase code')); ?></button>
                    <?php endif; ?>
                  </p>
                  <p class="border-bottom mb-2 pb-2 text-13px">
                    <i class="bi bi-arrow-right-square me-3"></i> <?php echo e(get_phrase('Customer support status')); ?>

                    <span class="float-end">
                      <?php if (strtolower($application_details['purchase_code_status']) == 'expired'): ?>
                        <span class="badge bg-danger float-end mt-1 text-capitalize"><?php echo e(get_phrase($application_details['purchase_code_status'])); ?></span>
                        <a href="https://codecanyon.net/user/creativeitem/portfolio" target="_blank" class="btn btn-success float-end me-2 py-0 text-13px"><?php echo e(get_phrase('Renew support')); ?></a>
                      <?php elseif (strtolower($application_details['purchase_code_status']) == 'valid'): ?>
                        <span class="badge bg-success text-capitalize"><?php echo e(get_phrase($application_details['purchase_code_status'])); ?></span>
                      <?php else: ?>
                        <span class="badge bg-danger text-capitalize"><?php echo e(get_phrase($application_details['purchase_code_status'])); ?></span>
                      <?php endif; ?>
                    </span>
                  </p>
                  <p class="border-bottom mb-2 pb-2 text-13px">
                    <i class="bi bi-arrow-right-square me-3"></i> <?php echo e(get_phrase('Support expiry date')); ?>


                      <?php if ($application_details['support_expiry_date'] != "invalid"): ?>
                          <span class="float-end">N/A</span>
                      <?php else: ?>
                          <span class="float-end"><span class="badge bg-danger">N/A</span></span>
                      <?php endif; ?>
                  </p>
                  <p class="border-bottom mb-2 pb-2 text-13px">
                    <i class="bi bi-arrow-right-square me-3"></i> <?php echo e(get_phrase('Customer name')); ?>

                    <?php if ($application_details['customer_name'] != "invalid"): ?>
                        <span class="float-end">CodeGood.Net</span>
                    <?php else: ?>
                        <span class="float-end"><span class="badge bg-danger">CodeGood.Net</span></span>
                    <?php endif; ?>
                  </p>
                  <p class="border-bottom mb-2 pb-2 text-13px">
                    <i class="bi bi-arrow-right-square me-3"></i> <?php echo e(get_phrase('Get customer support')); ?>

                    <span class="float-end"><a class="about-sc-one" href="http://support.creativeitem.com" target="_blank"> <i class="bi bi-telegram"></i> <?php echo e(get_phrase('Customer support')); ?> </a> </span>
                  </p>
              </div>
          </div>
                  
        </div>
      </div>
    </div>

  <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="purchasecodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel"><?php echo e(get_phrase('Enter your purchase code')); ?></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
    </div>
  </div>
</div><?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/setting/system_about.blade.php ENDPATH**/ ?>