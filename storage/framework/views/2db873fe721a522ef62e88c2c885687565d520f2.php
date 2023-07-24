<?php if(isset($post_react) && $post_react == true): ?>
<div class="post-react d-flex align-items-center">
    <?php $unique_values = array_unique($user_reacts); ?>
    <ul class="react-icons">
        <?php $__currentLoopData = $unique_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_react): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($user_react == 'like'): ?>
                <li><img class="w-17px" src="<?php echo e(asset('storage/images/like.svg')); ?>" alt=""></li>
            <?php endif; ?>

            <?php if($user_react == 'love'): ?>
                <li><img class="w-22px" src="<?php echo e(asset('storage/images/love.svg')); ?>" alt=""></li>
            <?php endif; ?>

            <?php if($user_react == 'sad'): ?>
                <li><img class="w-17px" src="<?php echo e(asset('storage/images/sad.svg')); ?>" alt=""></li>
            <?php endif; ?>

            <?php if($user_react == 'angry'): ?>
                <li><img class="w-17px" src="<?php echo e(asset('storage/images/angry.svg')); ?>" alt=""></li>
            <?php endif; ?>

            <?php if($user_react == 'haha'): ?>
                <li><img class="w-17px" src="<?php echo e(asset('storage/images/haha.svg')); ?>" alt=""></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php if(count($user_reacts) > 0): ?>
        <span class="react-count"><?php echo e(count($user_reacts)); ?></span>
    <?php else: ?>
        <span class="react-count">0 <?php echo e(get_phrase('Like')); ?></span>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if(isset($ajax_call) && $ajax_call): ?>
    <!--hr tag will be split by js to show different sections-->
    <hr>
<?php endif; ?>

<?php if(isset($my_react) && $my_react == true): ?>
    <?php if(array_key_exists($user_info->id, $user_reacts)): ?>
        <?php if($user_reacts[$user_info->id] == 'like'): ?>
            <div class="like-color">
                <img class="w-17px mt--6px" src="<?php echo e(asset('storage/images/liked.svg')); ?>" alt="">
                <?php echo e(get_phrase('Liked')); ?>

            </div>
        <?php endif; ?>

        <?php if($user_reacts[$user_info->id] == 'love'): ?>
            <div class="love-color">
                <img class="w-22px mt--4px" src="<?php echo e(asset('storage/images/love.svg')); ?>" alt="">
                <?php echo e(get_phrase('Loved')); ?>

            </div>
        <?php endif; ?>

        <?php if($user_reacts[$user_info->id] == 'haha'): ?>
            <div class="sad-color">
                <img class="w-17px mt--4px" src="<?php echo e(asset('storage/images/haha.svg')); ?>" alt="">
                <?php echo e(get_phrase('Haha')); ?>

            </div>
        <?php endif; ?>

        <?php if($user_reacts[$user_info->id] == 'angry'): ?>
            <div class="angry-color">
                <img class="w-17px mt--4px" src="<?php echo e(asset('storage/images/angry.svg')); ?>" alt="">
                <?php echo e(get_phrase('Angry')); ?>

            </div>
        <?php endif; ?>

        <?php if($user_reacts[$user_info->id] == 'sad'): ?>
            <div class="sad-color">
                <img class="w-17px mt--4px" src="<?php echo e(asset('storage/images/sad.svg')); ?>" alt="">
                Sad
            </div>
        <?php endif; ?>
    <?php else: ?>
        <?php if(isset($type)&&$type=="shorts"): ?>
            <div><i class="fa fa-thumbs-up <?php if(isset($type)&&$type=="shorts"): ?> shorts-icon-size <?php endif; ?>"></i></div>
        <?php else: ?>
            <div>
                <img class="w-17px mt--6px" src="<?php echo e(asset('storage/images/like2.svg')); ?>" alt="">
             <?php if(isset($type)&&$type=="shorts"): ?>  <?php else: ?> <?php echo e(get_phrase('Like')); ?> <?php endif; ?> </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/main_content/post_reacts.blade.php ENDPATH**/ ?>