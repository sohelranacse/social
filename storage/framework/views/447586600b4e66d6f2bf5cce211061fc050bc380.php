<div class="post-inner" id="tab-feeling">
    
    <div class="tag-wrap">
        <a href="javascript:void(0)" onclick="$('#tab-feeling').removeClass('current')" class="prev-btn"><i class="fa fa-long-arrow-left"></i></a>

        <div class="post-tagged mt-3">
            <div class="tag-card" id="feeling_and_activities">
            </div>
        </div>

        <h5 class="w-100 text-center py-4">
            <?php echo e(get_phrase('What are you doing')); ?> ?
        </h5>

        <h6><?php echo e(get_phrase('Activities')); ?></h6>

        <div class="feeling-list">
            <?php $all_activities = DB::table('feeling_and_activities')->where('type', 'activity')->get(); ?>
            <ul>
                <?php $__currentLoopData = $all_activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $icon_ext = pathinfo($all_activity->icon, PATHINFO_EXTENSION); ?>
                    <li>
                        <a href="javascript:void(0)" onclick="addFeelingActivity('<?php echo e($all_activity->feeling_and_activity_id); ?>', '<?php echo e($all_activity->title); ?>', '<?php echo e($all_activity->icon); ?>', '<?php echo e($icon_ext); ?>')">
                            <?php if($icon_ext == 'png' || $icon_ext == 'jpg' || $icon_ext == 'ico'): ?>
                                <img src="<?php echo e(asset('storage/images/'.$all_activity->icon)); ?>">
                            <?php else: ?>
                                <i class="<?php echo e($all_activity->icon); ?>"></i>
                            <?php endif; ?>
                            <?php echo e($all_activity->title); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <h4 class="h5">
        <?php echo e(get_phrase('How are you feeling')); ?> ?
    </h4>
    <div class="tag-wrap">
        <h6 class="pb-2"><?php echo e(get_phrase('Feelings')); ?></h6>

        <?php $all_feelings = DB::table('feeling_and_activities')->where('type', 'feeling')->get(); ?>
        <div class="feeling-list feeling-alt d-flex">
            <ul class="w-100">
                <?php $__currentLoopData = $all_feelings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_feeling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $icon_ext = pathinfo($all_feeling->icon, PATHINFO_EXTENSION); ?>
                    <li class="float-start w-50">
                        <a href="javascript:void(0)" class="px-2 py-1" onclick="addFeelingActivity('<?php echo e($all_feeling->feeling_and_activity_id); ?>', '<?php echo e($all_feeling->title); ?>', '<?php echo e($all_feeling->icon); ?>', '<?php echo e($icon_ext); ?>')">
                            <?php if($icon_ext == 'png' || $icon_ext == 'jpg' || $icon_ext == 'ico'): ?>
                                <span><img src="<?php echo e(asset('storage/images/'.$all_feeling->icon)); ?>"></span>
                            <?php else: ?>
                                <i class="<?php echo e($all_feeling->icon); ?>"></i>
                            <?php endif; ?>
                            <?php echo e($all_feeling->title); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/main_content/create_post_felling_and_activity.blade.php ENDPATH**/ ?>