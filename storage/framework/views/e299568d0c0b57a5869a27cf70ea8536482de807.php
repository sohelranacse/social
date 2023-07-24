<?php $__currentLoopData = $all_videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="single-item-countable single-photo">
            <video onclick="$(location).prop('href', '<?php echo e(route('single.post', $video->post_id)); ?>')" class="w-100 video_details_height2 cursor-pointer" muted src="<?php echo e(get_post_video($video->file_name)); ?>">
            
        </video>
        <div class="post-controls dropdown dotted">
            <a class="nav-link dropdown-toggle" href="#"
                id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
            </a>
            <ul class="dropdown-menu"
                aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?php echo e(route('single.post', $video->post_id)); ?>" ><?php echo e(get_phrase('Watch video')); ?></a></li>
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirmAction('<?php echo route('delete.mediafile', $video->id); ?>', true)"><?php echo e(get_phrase('Delete Video')); ?></a></li>
            </ul>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/profile/video_single.blade.php ENDPATH**/ ?>