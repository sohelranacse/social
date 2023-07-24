<div class="mypage-wrap my-2" id="pagedata">
    <?php $__currentLoopData = $mypages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mypage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="smp-item d-flex align-items-center single-item-countable" id="page-<?php echo e($mypage->id); ?>" >
            <a href="<?php echo e(route('single.page',$mypage->id)); ?>">
                <img src="<?php echo e(get_page_logo($mypage->logo, 'logo')); ?>" class="rounded-8px" width="90px" alt="">
            </a>
            <div class="smp-info">
                <a href="<?php echo e(route('single.page',$mypage->id)); ?>"> <h4 class="h6"><?php echo e(ellipsis($mypage->title,10)); ?></h4> </a>
                <?php
                    $likecount = \App\Models\Page_like::where('page_id',$mypage->id)->count();
                ?>
                <a href="<?php echo e(route('single.page',$mypage->id)); ?>"><span><i class="fa fa-thumbs-up"></i><?php echo e($likecount); ?> <?php echo e(get_phrase('People like this')); ?></span></a>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/pages/single-page.blade.php ENDPATH**/ ?>