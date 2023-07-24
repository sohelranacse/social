
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Payment gateways')); ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-12">
        <div class="eSection-wrap-2">
          <!-- Filter area -->
          <div class="table-responsive">
            <table class="table eTable " id="">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col"><?php echo e(get_phrase('Payment Gateway')); ?></th>
                  <th scope="col"><?php echo e(get_phrase('Currency')); ?></th>
                  <th scope="col"><?php echo e(get_phrase('Environment')); ?></th>
                  <th scope="col"><?php echo e(get_phrase('Status')); ?></th>
                  <th scope="col" class="text-center"><?php echo e(get_phrase('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $payment_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment_gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$key); ?></td>
                        <td><?php echo e($payment_gateway->title); ?></td>
                        <td><?php echo ellipsis(script_checker($payment_gateway->currency), 50); ?></td>
                        <td>
                        	<?php if($payment_gateway->test_mode == 1): ?>
	                            <span class="badge bg-warning"><?php echo e(get_phrase('Test Mode')); ?></span>
	                        <?php else: ?>
	                            <span class="badge bg-success"><?php echo e(get_phrase('Live Mode')); ?></span>
	                        <?php endif; ?>
                        </td>
                        <td>
                          <?php if($payment_gateway->status == 1): ?>
                            <span class="badge bg-success"><?php echo e(get_phrase('Active')); ?></span>
                          <?php else: ?>
                            <span class="badge bg-secondary"><?php echo e(get_phrase('Deactive')); ?></span>
                          <?php endif; ?>
                        </td>
                        
                        <td class="text-center">
                          <div class="adminTable-action me-auto">
                            <button type="button" class="eBtn eBtn-black dropdown-toggle table-action-btn-2" data-bs-toggle="dropdown" aria-expanded="false">
                              <?php echo e(get_phrase('Actions')); ?>

                            </button>
                            <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                              <li><a class="dropdown-item" href="<?php echo e(route('admin.payment_gateway.edit', $payment_gateway->id)); ?>"><?php echo e(get_phrase('Edit')); ?></a></li>

	                            <?php if($payment_gateway->status == 1): ?>
	                              <li><a class="dropdown-item" onclick="return confirm('<?php echo e(get_phrase('Are you sure want to change status?')); ?>')" href="<?php echo e(route('admin.payment_gateway.status', $payment_gateway->id)); ?>"><?php echo e(get_phrase('Deactive')); ?></a></li>
	                            <?php else: ?>
	                              <li><a class="dropdown-item" onclick="return confirm('<?php echo e(get_phrase('Are you sure want to change status?')); ?>')" href="<?php echo e(route('admin.payment_gateway.status', $payment_gateway->id)); ?>"><?php echo e(get_phrase('Active')); ?></a></li>
	                            <?php endif; ?>

	                            <?php if($payment_gateway->test_mode == 1): ?>
                                  <li><a class="dropdown-item" onclick="return confirm('<?php echo e(get_phrase('Are you sure want to change environment?')); ?>')" href="<?php echo e(route('admin.payment_gateway.environment', $payment_gateway->id)); ?>"><?php echo e(get_phrase('Activate live mode')); ?></a></li>
                                <?php else: ?>
                                  <li><a class="dropdown-item" onclick="return confirm('<?php echo e(get_phrase('Are you sure want to change environment?')); ?>')" href="<?php echo e(route('admin.payment_gateway.environment', $payment_gateway->id)); ?>"><?php echo e(get_phrase('Activate test mode')); ?></a></li>
                                <?php endif; ?>
                            </ul>
                          </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End Admin area -->

   
    <!-- Start Footer -->
    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->
  </div>



<?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/payment/payment_gateways.blade.php ENDPATH**/ ?>