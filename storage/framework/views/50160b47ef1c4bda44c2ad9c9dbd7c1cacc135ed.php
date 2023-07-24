<?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="javascript:void(0)" class="d-flex" onclick="tagPeople('<?php echo e($friend->id); ?>', '<?php echo e($friend->name); ?>')">
        <div class="avatar">
            <img src="<?php echo e(get_user_image($friend->photo, 'optimized')); ?>" class="rounded-circle user_image_show_on_modal" alt="">
        </div>
        <h4><?php echo e($friend->name); ?></h4>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/main_content/friend_list_for_tagging.blade.php ENDPATH**/ ?>