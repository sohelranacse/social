<div class="suggest-wrap row">
    <?php $__currentLoopData = $suggestedpages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestedpage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6 mb-3">
            <div class="card sugg-card p-2 rounded">
                <a href="<?php echo e(route('single.page',$suggestedpage->id)); ?>" class="mb-2 thumbnail-110-106" style="background-image: url('<?php echo e(get_page_logo($suggestedpage->logo, 'logo')); ?>')"></a>
                <h4><a href="#"><?php echo e(ellipsis($suggestedpage->title,10)); ?></a></h4>
                <?php
                $likecount = \App\Models\Page_like::where('page_id',$suggestedpage->id)->count();
                ?>
                <span class="small text-muted"><?php echo e($likecount); ?> <?php echo e(('likes')); ?></span>
                <?php
                    $likecount = \App\Models\Page_like::where('page_id',$suggestedpage->id)->where('user_id',auth()->user()->id)->count();
                ?>
                <?php if($likecount>0): ?>
                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$suggestedpage->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i><?php echo e(('Liked')); ?></a>
                <?php else: ?>
                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$suggestedpage->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i><?php echo e(get_phrase('Like')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/pages/suggested.blade.php ENDPATH**/ ?>