
<?php
    $group = \App\Models\Group::find($group_id);
?>
<form class="ajaxForm" action="<?php echo e(route('group.update',$group->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Group Title')); ?></label>
        <input type="text" class="border-0 bg-secondary" name="name" value="<?php echo e($group->title); ?>" placeholder="<?php echo e(get_phrase('Enter your group title')); ?>">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Group Sub Title')); ?></label>
        <input type="text" class="border-0 bg-secondary" name="subtitle" value="<?php echo e($group->subtitle); ?>" placeholder="<?php echo e(get_phrase('Enter your group sub title')); ?>">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Group Location')); ?></label>
        <input type="text" class="border-0 bg-secondary" name="location" value="<?php echo e($group->location); ?>" placeholder="<?php echo e(get_phrase('Enter your group location')); ?>">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Group Type')); ?></label>
        <input type="text" class="border-0 bg-secondary" name="group_type" value="<?php echo e($group->group_type); ?>" placeholder="<?php echo e(get_phrase('Enter your group type')); ?>">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('About')); ?></label>
        <textarea name="about" class="border-0 bg-secondary content" id="about" cols="30" rows="10"><?php echo e($group->about); ?></textarea>
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Privacy')); ?></label>
        <select name="privacy" id="privacy" class="form-control border-0 bg-secondary">
            <option value="public" <?php echo e($group->privacy=="public" ? "selected":""); ?>>Public</option>
            <option value="private" <?php echo e($group->privacy=="private" ? "selected":""); ?>>Private</option>
        </select>
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Status')); ?></label>
        <select name="status" id="status" class="form-control border-0 bg-secondary">
            <option value="1" <?php echo e($group->status=="1" ? "selected":""); ?>>Active</option>
            <option value="0" <?php echo e($group->status=="0" ? "selected":""); ?>>Deactive</option>
        </select>
    </div>
    <div>
        <label for=""><?php echo e(get_phrase('Previous Profile Photo')); ?></label> <br>
        <img src="<?php echo e(get_group_logo($group->logo, 'logo')); ?>" class="w-20 height-100-css" alt="">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Update Profile Photo')); ?></label>
        <input type="file" name="image" id="image" class="form-control border-0 bg-secondary">
    </div>
    <button type="submit" class="w-100 btn btn-primary"><?php echo e(get_phrase('Edit Group')); ?></button>
</form>


<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/groups/edit-modal.blade.php ENDPATH**/ ?>