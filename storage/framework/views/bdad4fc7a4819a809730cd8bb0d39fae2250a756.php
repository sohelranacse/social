<div class="suggest-wrap row">
    <?php $__currentLoopData = $likedpage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $likepage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $pagedata = \App\Models\Page::find($likepage->page_id);
        ?>
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6 mb-3">
            <div class="card sugg-card p-2 rounded">
                <a href="<?php echo e(route('single.page',$pagedata->id)); ?>" class="mb-2 thumbnail-110-auto" style="background-image: url('<?php echo e(get_page_logo($pagedata->logo, 'logo')); ?>')"></a>
                <h4><a href="<?php echo e(route('single.page',$pagedata->id)); ?>"><?php echo e(ellipsis($pagedata->title,10)); ?></a></h4>
                <?php
                    $likecount = \App\Models\Page_like::where('page_id',$pagedata->id)->count();
                ?>
                <span class="small text-muted"><?php echo e(get_phrase('____ likes', [$likecount])); ?></span>
                <?php
                //checking this user data if this user already liker or not
                    $likecount = \App\Models\Page_like::where('page_id',$likepage->page_id)->where('user_id',auth()->user()->id)->count();
                ?>
                <?php if($likecount>0): ?>
                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$likepage->page_id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i><?php echo e(('Liked')); ?></a>
                <?php else: ?>
                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$likepage->page_id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i><?php echo e(('Like')); ?></a>
                <?php endif; ?>
            </div><!--  Card End -->
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div> <?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/pages/liked-page.blade.php ENDPATH**/ ?>