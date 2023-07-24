<div class="page-wrap">
    <div class="d-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><img width="12" src="<?php echo e(asset('assets/frontend/images/stickies-fill.png')); ?>" alt=""></span> <?php echo e(get_phrase('Create New Article')); ?></h3>
       
    </div>
    <div class="card mt-3 px-3 py-4">
        <div class="create-article">
            <?php if($errors->any()): ?>
                <div class="text-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('blog.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="#"><?php echo e(get_phrase('Title')); ?></label>
                    <input type="text" name="title" placeholder="Enter your title">
                </div>
                <div class="form-group">
                    <label for="#"><?php echo e(get_phrase('Category')); ?></label>
                    <select name="category" id="category" required class="form-control bg-secondary">
                        <option value="" selected disabled><?php echo e(get_phrase('Select Category')); ?></option>
                        <?php $__currentLoopData = $blog_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="#"><?php echo e(get_phrase('Tags')); ?></label>
                    <input type="text" name="tag" class="form-control bg-secondary" placeholder="Enter your tags">
                </div>
                <div class="form-group">
                    <label for="#"><?php echo e(get_phrase('Description')); ?></label>
                    <textarea name="description" id="description" class="content"  placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="#"><?php echo e(get_phrase('Image')); ?></label>
                    <input type="file" name="image" id="image">
                </div>
                
                
                <div class="inline-btn mt-3">
                    <button type="submit" class="btn btn-primary w-100"><?php echo e(get_phrase('Create Post')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/blogs/create_blog.blade.php ENDPATH**/ ?>