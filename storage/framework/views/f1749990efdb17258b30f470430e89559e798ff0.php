<div class="newsfeed-form single-entry">
    <div class="entry-inner">
        <div class="create-entry">
            <?php if(isset($page_id)&&!empty($page_id)): ?>
                <?php
                    $page = \App\Models\Page::find($page_id);
                ?>
                <a href="<?php echo e(route('single.page',$page_id)); ?>" class="author-thumb d-flex align-items-center">
                    <img src="<?php echo e(get_page_logo($page->logo, 'logo')); ?>" width="40px" height="40px" class="rounded-circle" alt="">
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('profile')); ?>" class="author-thumb d-flex align-items-center">
                    <img src="<?php echo e(get_user_image($user_info->photo, 'optimized')); ?>" width="40px" height="40px" class="rounded-circle" alt="">
                </a>
            <?php endif; ?>
            <button class="btn-trans" data-bs-toggle="modal" data-bs-target="#createPost">
                <?php echo e(get_phrase("What's on your mind ____", [auth()->user()->name])); ?>?
            </button>

            <?php if(isset($page_id)&&!empty($page_id)): ?>
                <?php echo $__env->make('frontend.main_content.create_post_modal',['page_id'=>$page_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php elseif(isset($group_id)&&!empty($group_id)): ?>
                <?php echo $__env->make('frontend.main_content.create_post_modal',['group_id'=>$group_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('frontend.main_content.create_post_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </div>
        <?php if(Route::currentRouteName() == 'timeline'): ?>
            <div class="post-options justify-content-center">
                <button class="btn" data-bs-toggle="modal" data-bs-target="#createPost"><img src="<?php echo e(asset('storage/images/image.svg')); ?>" alt="photo"><?php echo e(get_phrase('Photo')); ?>/<?php echo e(get_phrase('Video')); ?></button>
                <button class="btn" data-bs-toggle="modal" data-bs-target="#createPost"><img src="<?php echo e(asset('storage/images/location.png')); ?>" alt="photo" alt="photo"><?php echo e(get_phrase('Location')); ?></button>
                <button class="btn" data-bs-toggle="modal" data-bs-target="#createPost"><img src="<?php echo e(asset('storage/images/camera.svg')); ?>" alt="photo"><?php echo e(get_phrase('Live Video')); ?></button>
                <button class="btn" data-bs-toggle="modal" data-bs-target="#createPost"><img src="<?php echo e(asset('storage/images/plus-circle-fill.svg')); ?>" alt="photo"><?php echo e(get_phrase('More')); ?></button>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/main_content/create_post.blade.php ENDPATH**/ ?>