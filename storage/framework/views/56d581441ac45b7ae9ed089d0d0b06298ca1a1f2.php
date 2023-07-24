<?php $user_info = Auth()->user() ?>

<?php echo $__env->make('frontend.story.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('frontend.main_content.create_post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div id="timeline-posts">
    <?php echo $__env->make('frontend.main_content.posts',['type'=>'user_post'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/main_content/index.blade.php ENDPATH**/ ?>