<div class="page-wrap">
    <div class="d-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><img width="12" src="<?php echo e(asset('assets/frontend/images/stickies-fill.png')); ?>" alt=""></span> <?php echo e(get_phrase('My Article')); ?></h3>
        <div class="">
            <a href="<?php echo e(route('create.blog')); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle me-1"></i><?php echo e(get_phrase('Create articles')); ?></a>
        </div>
    </div>
    <div class="row g-3 blog-cards mt-3">
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-4" id="blog-<?php echo e($blog->id); ?>">
                <article class="single-entry">
                    <div class="entry-img">
                        <a href="<?php echo e(route('single.blog',$blog->id)); ?>"><img src="<?php echo e(get_blog_image($blog->thumbnail,'thumbnail')); ?>" alt="" class="img-fluid w-100"></a>
                        <span class="date-meta"><?php echo e($blog->created_at->format("d-M-Y")); ?></span>
                    </div>
                    <div class="entry-txt">
                        <div class="blog-meta">
                            <span><a href="#"><?php echo e($blog->cagtegory->name); ?></a></span>
                        </div>
                        <h3 class="h6"><a href="<?php echo e(route('single.blog',$blog->id)); ?>"><?php echo e($blog->title); ?></a></h3>
                        <div class="d-flex justify-content-between blog-ava">
                            <div class="d-flex">
                                <img src="<?php echo e(get_user_image($blog->user_id,'optimized')); ?>" class="user-round" alt="">
                                <div class="ava-info">
                                    <h6><a href="#"><?php echo e($blog->getUser->name); ?></a></h6>
                                    <small><?php echo e($blog->created_at->diffForHumans()); ?> </small>
                                </div>
                            </div>
                            <div class="dropdown">
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis"></i> 
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a href="<?php echo e(route('blog.edit',$blog->id)); ?>" class="dropdown-item btn btn-primary btn-sm"> <i class="fa fa-edit"></i> <?php echo e(get_phrase('Edit Article')); ?></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('blog.delete', ['blog_id' => $blog->id]); ?>', true)" class="dropdown-item btn btn-primary btn-sm"><i class="fa fa-trash me-1"></i> <?php echo e(get_phrase('Delete Article')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/blogs/user_blog.blade.php ENDPATH**/ ?>