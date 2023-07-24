
   
<?php $__env->startSection('content'); ?>
<?php if(isset($db_connection) && $db_connection != "") { ?>
  <div class="row ins-seven">
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-danger">
        <strong><?php echo e($db_connection); ?></strong>
      </div>
    </div>
  </div>
<?php } ?>
<div class="row justify-content-center ins-two">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body px-4">
        <div class="panel panel-default ins-three" data-collapsed="0">
          <!-- panel body -->
          <div class="panel-body ins-four">
            <p class="ins-four">
              <?php echo e(__('Below you should enter your database connection details.').' '.__('If you’re not sure about these, contact your host.')); ?>

            </p>
            <br>
            <div class="row">
              <div class="col-md-12">
                <form class="form-horizontal form-groups" method="post"
                  action="<?php echo e(route('step3')); ?>">
                  <?php echo csrf_field(); ?> 
                  <hr>
                  <div class="form-group">
            				<label class="control-label"><?php echo e(__('Database Name')); ?></label>
            					<input type="text" class="form-control eForm-control" name="dbname" placeholder=""
                        required autofocus>
                    <div>
                      <?php echo e(__('The name of the database you want to use with this application')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="control-label"><?php echo e(__('Username')); ?></label>
            					<input type="text" class="form-control eForm-control" name="username" placeholder=""
                        required>
                    <div>
                      <?php echo e(__('Your database Username')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="control-label"><?php echo e(__('Password')); ?></label>
            				<input type="password" class="form-control eForm-control" name="password" placeholder="">
                    <div>
                      <?php echo e(__('Your database Password')); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="control-label"><?php echo e(__('Database Host')); ?></label>
            					<input type="text" class="form-control eForm-control" name="hostname" placeholder=""
                        required>
                    <div>
                      <?php echo e(__("If 'localhost' does not work, you can get the hostname from web host")); ?>

                    </div>
            			</div>
                  <hr>
                  <div class="form-group">
            				<label class="control-label"></label>
            					<button type="submit" class="btn btn-primary"><?php echo e(__('Continue')); ?></button>
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
<?php echo $__env->make('install.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/install/step3.blade.php ENDPATH**/ ?>