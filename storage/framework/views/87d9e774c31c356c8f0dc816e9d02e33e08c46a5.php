<form class="ajaxForm" action="<?php echo e(route('videos.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="entry-header d-flex justify-content-between">
        <div class="ava-info d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="<?php echo e(get_user_image(auth()->user()->photo,'optimized')); ?>" class="rounded-circle user_image_show_on_modal" alt="...">
            </div>
            <div class="ava-desc ms-2">
                <h3 class="mb-0 h6"><?php echo e(auth()->user()->name); ?></h3>
                <span class="meta-time text-muted"><a href="#"><?php echo e(auth()->user()->profession); ?></a></span>
            </div>
        </div>
        <div class="post-controls dropdown">
            <select name="privacy" id="privacy" class="form-control bg-secondary border-0">
                <option value="public"><?php echo e(get_phrase('Public')); ?></option>
                <option value="private"><?php echo e(get_phrase('Private')); ?></option>
            </select>
        </div>
    </div>
    <div class="form-group pt-2">
        <label for="title"><?php echo e(get_phrase('Title')); ?></label>
        <input type="text" class="bg-secondary border-0" name="title" value="" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Category')); ?></label>
        <select name="category" id="category" class="form-control bg-secondary border-0">
            <option value="video"><?php echo e(get_phrase('Video')); ?></option>
            <option value="shorts"><?php echo e(get_phrase('Shorts')); ?></option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Video/Shorts')); ?></label>
        <input type="file" name="video" id="image" class="form-control bg-secondary border-0">
    </div>
    <button type="submit" class="w-100 btn btn-primary"><?php echo e(get_phrase('Create')); ?></button>
</form>

<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/video-shorts/create.blade.php ENDPATH**/ ?>