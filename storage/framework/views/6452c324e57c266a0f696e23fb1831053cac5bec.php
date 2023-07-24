<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-4 my-1 single-item-countable" id="blog-<?php echo e($blog->id); ?>">
        <article class="single-entry">
            <a href="<?php echo e(route('single.blog',$blog->id)); ?>">
                <div class="entry-img thumbnail-210-200" style="background-image: url('<?php echo e(get_blog_image($blog->thumbnail,'thumbnail')); ?>')">
                    <span class="date-meta"><?php echo e($blog->created_at->timezone(Auth::user()->timezone)->format("d-M-Y")); ?></span>
                </div>
            </a>
            <div class="entry-txt min-hight-125px">
                <div class="blog-meta">
                    <span><a href="<?php echo e(route('single.blog',$blog->id)); ?>"><?php echo e($blog->cagtegory->name); ?></a></span>
                </div>
                <h3 class="h6 ellipsis-line-2"><a href="<?php echo e(route('single.blog',$blog->id)); ?>"><?php echo e($blog->title); ?></a></h3>
                <div class="d-flex blog-ava">
                    <img src="<?php echo e(get_user_image($blog->user_id,'optimized')); ?>" class="user-round" alt="">
                    <div class="ava-info">
                        <h6><a href="<?php echo e(route('user.profile.view',$blog->getUser->id)); ?>"><?php echo e($blog->getUser->name); ?> </a></h6>
                        <small><?php echo e($blog->created_at->timezone(Auth::user()->timezone)->diffForHumans()); ?> </small>
                    </div>
                </div>
            </div>
        </article>
    </div> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/blogs/blog-single.blade.php ENDPATH**/ ?>