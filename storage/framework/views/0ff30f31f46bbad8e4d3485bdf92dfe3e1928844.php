<h4 class="widget-title"><?php echo e(get_phrase('Info')); ?></h4>
<ul>
    <li>
        <i class="fa fa-briefcase"></i> <span>
        <strong><?php echo e($user_info->job); ?></strong></span>
    </li>
    <li>
        <i class="fa-solid fa-graduation-cap"></i>
        <span><?php echo e(get_phrase('Stadied at')); ?> <strong><?php echo e($user_info->studied_at); ?></strong></span>
    </li>
    <li>
        <i class="fa-solid fa-location-dot"></i>
        <span><?php echo e(get_phrase('From')); ?> <strong><?php echo e($user_info->address); ?></strong></span>
    </li>
    <li>
        <i class="fa-solid fa-user"></i>
        <span><strong class="text-capitalize"><?php echo e(get_phrase($user_info->gender)); ?></strong></span>
    </li>
    <li>
        <i class="fa-solid fa-clock"></i>
        <span><?php echo e(get_phrase('Joined')); ?> <strong><?php echo e(date_formatter($user_info->created_at, 1)); ?></strong></span>
    </li>
</ul>
<button onclick="showCustomModal('<?php echo route('profile.my_info', ['action_type' => 'edit']); ?>', '<?php echo e(get_phrase('Edit info')); ?>')" class="btn btn-primary w-100 mt-3"><?php echo e(get_phrase('Edit Info')); ?></button>
<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/profile/my_info.blade.php ENDPATH**/ ?>