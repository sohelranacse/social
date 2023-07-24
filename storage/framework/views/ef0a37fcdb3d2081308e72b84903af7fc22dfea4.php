
   
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center ins-two">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="panel panel-default ins-three" data-collapsed="0">
    			<!-- panel body -->
    			<div class="panel-body ins-four">
            <p class="ins-four">
              <?php echo e(__('Welcome to Sociopro social platform Installation. You will need to know the following items before proceeding.')); ?>

            </p>
            <ol>
              <li><?php echo e(__('Codecanyon purchase code')); ?></li>
              <li><?php echo e(__('Database Name')); ?></li>
              <li><?php echo e(__('Database Username')); ?></li>
              <li><?php echo e(__('Database Password')); ?></li>
              <li><?php echo e(__('Database Hostname')); ?></li>
            </ol>
            <p class="ins-four">
              <?php echo e(__('We are going to use the above information to write database.php file which will connect the application to your database.').' '.__('During the installation process, we will check if the files that are needed to be written')); ?>

              (<strong><?php echo e(__('config/database.php')); ?></strong>) <?php echo e(__('have')); ?>

              <strong><?php echo e(__('write permission')); ?></strong>. <?php echo e(__('We will also check if')); ?> <strong><?php echo e(__('curl')); ?></strong> <?php echo e(__('and')); ?> <strong><?php echo e(__('php mail functions')); ?></strong>
              <?php echo e(__('are enabled on your server or not.')); ?>

            </p>
            <p class="ins-four">
              <?php echo e(__('Gather the information mentioned above before hitting the start installation button. If you are ready....')); ?>'
            </p>
            <br>
            <p>
              <a href="<?php echo e(route('step1')); ?>" class="btn btn-primary">
                <?php echo e(__('Start Installation Process')); ?>

              </a>
            </p>
    			</div>
    		</div>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('install.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/install/step0.blade.php ENDPATH**/ ?>