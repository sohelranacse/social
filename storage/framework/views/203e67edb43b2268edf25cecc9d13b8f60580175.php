
   
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center ins-two">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body px-4">
        <div class="panel panel-default ins-three" data-collapsed="0">
          <!-- panel body -->
          <div class="panel-body ins-four">
            <center>
              <i class="entypo-thumbs-up ins-five"></i>
              <h3><?php echo e(__('Congratulations!! The installation was successfull')); ?></h3>
            </center>
            <br>
            <center>
              <strong>
                <?php echo e(__("Before you start using your application, make it yours. Set your application name and title, admin login email and
                password. Remember the login credentials which you will need later on for signing into your account. After this step,
                you will be redirected to application's login page.")); ?>

              </strong>
            </center>
            <br>
            <div class="row">
              <div class="col-md-12">
                <form class="form-horizontal form-groups" method="post"
                  action="<?php echo e(route('finalizing_setup')); ?>">
                  <?php echo csrf_field(); ?> 
                  <div class="form-group">
            				<label class="col-sm-3 control-label"><?php echo e(__('System Name')); ?></label>
            				
            					<input type="text" class="form-control eForm-control" name="system_name"
                        required autofocus>
                    <div>
                      <?php echo e(__('The name of your application')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="col-sm-3 control-label"><?php echo e(__('Your name')); ?></label>
            				
            					<input type="text" class="form-control eForm-control" name="admin_name" placeholder="Ex: John Doe" required>
                    <div>
                      <?php echo e(__('Full name of Administrator')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="col-sm-3 control-label"><?php echo e(__('Your Email')); ?></label>
            				
            					<input type="email" class="form-control eForm-control" name="admin_email" placeholder="Ex: john@example.com" required>
                    <div>
                      <?php echo e(__('Email address for administrator login')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="col-sm-3 control-label"><?php echo e(__('Password')); ?></label>
            				
            					<input type="password" class="form-control eForm-control" name="admin_password" placeholder=""
                        required>
                    <div>
                      <?php echo e(__('Admin login password')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo e(__('Your Address')); ?></label>
                    
                      <input type="text" class="form-control eForm-control" name="admin_address" placeholder="Ex: Your Address" required>
                    <div>
                      <?php echo e(__('Address of Administrator')); ?>

                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo e(__('Your Phone')); ?></label>
                    
                      <input type="number" class="form-control eForm-control" name="admin_phone" placeholder="Ex: +9020040060" required>
                    <div>
                      <?php echo e(__('Phone of Administrator')); ?>

                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
            				<label class="col-sm-3 control-label"><?php echo e(__('TimeZone')); ?></label>
            				
                      <select class="form-select eForm-select eChoice-multiple-with-remove" id="timezone" name="timezone">
                        <?php $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL); ?>
                        <?php foreach ($tzlist as $tz): ?>
                          <option value="<?php echo e($tz); ?>" <?php echo e($tz == 'Asia/Dhaka' ?  'selected':''); ?>><?php echo e($tz); ?></option>
                        <?php endforeach; ?>
                      </select>
                    <div class="">
                      <?php echo e(__('Choose System TimeZone')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="col-sm-3 control-label"></label>
            				<div class="col-sm-7">
            					<button type="submit" class="btn btn-primary"><?php echo e(__('Set me up')); ?></button>
            				</div>
            			</div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('install.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/install/finalizing_setup.blade.php ENDPATH**/ ?>