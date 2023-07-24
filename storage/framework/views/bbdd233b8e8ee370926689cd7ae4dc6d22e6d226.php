<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $is_invited = \App\Models\Invite::where('invite_reciver_id',$user->id)->where('group_id',$group_id)->count();
    ?>
    <?php if($is_invited=='0'): ?>
        <div class="single-suggest d-flex justify-content-between align-items-center" onclick="inviteGroupPeople('<?php echo e($user->id); ?>', '<?php echo e($user->name); ?>')">
            <div class="suggest-avatar d-flex justify-content-between align-items-center">
                <img src="<?php echo e(get_user_image($user->photo,'optimized')); ?>" class="img-fluid rounded-circle user_image_show_on_modal" width="45" alt="Avatar">
                <h3 class="h6 ms-2"><?php echo e($user->name); ?></h3>
            </div>
            <button class="btn btn-secondary" type="button"><i class="fa fa-plus"></i></button>
        </div> 
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                   <?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/groups/invite-user.blade.php ENDPATH**/ ?>