<div class="page-wrap">
    <div class="blog-header mb-3" style="background-image: url('<?php echo e(asset('assets/frontend/images/blog-bg.png')); ?>')">
        <h1 class="h3"><?php echo e(get_phrase('Blogs')); ?></h1>
        <p><?php echo e(get_phrase('Discover new articles')); ?></p>
        <div class="btn-inline">
            <a href="<?php echo e(route('create.blog')); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-circle-plus me-2"></i><?php echo e(get_phrase('Create Blog')); ?></a>
            <a href="<?php echo e(route('myblog')); ?>" class="btn bg-white btn-sm ms-2"><?php echo e(get_phrase('My articles')); ?></a>
        </div>
    </div>
    <div class="card blog-tags p-4">
        <div class="tags">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('category.blog',$category->id)); ?>" class=""><?php echo e($category->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div>
    </div>
    
    <div class="g-3 blog-cards mt-3" >
        <div class="row" id="blogdatashow"> 
            <?php echo $__env->make('frontend.blogs.blog-single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div> <!-- Page Wrap End --><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/blogs/blogs.blade.php ENDPATH**/ ?>