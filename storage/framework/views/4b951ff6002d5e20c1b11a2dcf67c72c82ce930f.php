<?php $__currentLoopData = $media_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($media_file->file_type == 'video'): ?>
        <div class="single-item-countable col">
            <a href="<?php echo e(route('single.post',$media_file->post_id)); ?>">
                <video muted controlsList="nodownload" class="img-thumbnail w-100 user_info_custom_height">
                    <source src="<?php echo e(get_post_video($media_file->file_name)); ?>" type="">
                </video>
            </a>
        </div>
    <?php else: ?>
        <div class="single-item-countable col">
            <a href="<?php echo e(route('single.post',$media_file->post_id)); ?>">
                <img class="img-thumbnail w-100 user_info_custom_height" src="<?php echo e(get_post_image($media_file->file_name, 'optimized')); ?>">
            </a>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/profile/sidebar_photos_and_videos.blade.php ENDPATH**/ ?>