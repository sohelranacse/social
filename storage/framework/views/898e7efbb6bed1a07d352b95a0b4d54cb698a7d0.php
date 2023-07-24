<div class="profile-cover rounded">
    <div class="profile-header" style="background-image: url('<?php echo e(get_group_cover_photo($group->banner,"coverphoto")); ?>')">
        <?php if($group->user_id==auth()->user()->id): ?>
            <button onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.groups.edit-cover-photo','group_id'=>$group->id])); ?>', '<?php echo e(get_phrase('Update your cover photo')); ?>');" class="edit-cover btn"><i class="fa fa-camera"></i><?php echo e(get_phrase('Edit Cover Photo')); ?></button>
        <?php endif; ?>
        <div class="profile-avatar d-flex align-items-center ps-4">
            <div class="avatar avatar-xl"><img src="<?php echo e(get_group_logo($group->logo, 'logo')); ?>" class="user-round" alt=""></div>
            <div class="avatar-details">
                <h3 class="mb-1"><?php echo e($group->title); ?></h3>
                <span class="mute d-block text-white"><?php echo e($group->subtitle); ?></span>
                <span class="mute d-block text-white"><?php echo e($group->privacy); ?></span>
                <?php if($group->user_id==auth()->user()->id): ?>
                    <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.groups.edit-modal', 'group_id' => $group->id])); ?>', '<?php echo e(get_phrase('Edit Group')); ?>');" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#edit-profile"><i class="fa fa-pen"></i><?php echo e(get_phrase('Edit Group')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>





<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/groups/cover-photo.blade.php ENDPATH**/ ?>