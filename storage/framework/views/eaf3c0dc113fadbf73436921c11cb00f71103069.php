<div class="row gx-3">
    <div class="col-lg-7">
        <div class="group-inner bg-white border rounded p-3">
            <div class="gr-search">
                <h3 class="h6"><span><i class="fa-solid fa-users"></i></span><?php echo e(get_phrase('Group')); ?> </h3>
                <form action="<?php echo e(route('search.group')); ?>" method="GET">
                    <input type="text" class="bg-secondary rounded" name="search" value="<?php if(isset($_GET['search'])): ?> <?php echo e($_GET['search']); ?> <?php endif; ?>" placeholder="Search Group">
                    <span class="i fa fa-search"></span>
                </form>
            </div>
            <div class="page-suggest mt-4">
                <h3 class="h6"><?php echo e(get_phrase('All Groups')); ?></h3>
                <div class="ps-wrap mt-3 justify-content-between">
                    <div class="row">
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-lg-6 col-xl-6 col-sm-4 col-6">
                                <div class="card p-2 rounded">
                                    <div class="mb-2 thumbnail-103-103" style="background-image: url('<?php echo e(get_group_logo($group->logo,'logo')); ?>');"></div>
                                    <a href="<?php echo e(route('single.group',$group->id)); ?>"><h4><?php echo e(ellipsis($group->title,10)); ?></h4></a>
                                    <?php $joined = \App\Models\Group_member::where('group_id',$group->id)->where('is_accepted','1')->count(); ?>
                                    <span class="small text-muted"><?php echo e($joined); ?> <?php echo e(get_phrase('Member')); ?><?php echo e($joined>1?"s":""); ?></span>
                                    <?php $join = \App\Models\Group_member::where('group_id',$group->id)->where('user_id',auth()->user()->id)->count(); ?>
                                    <?php if($join>0): ?>
                                        <?php if($group->user_id==auth()->user()->id): ?>
                                            <a href="javascript:void(0)" class="btn btn-secondary"><?php echo e(get_phrase('Admin')); ?></a>
                                        <?php else: ?>
                                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->id); ?>')" class="btn btn-secondary"><?php echo e(get_phrase('Joined')); ?></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.join',$group->id); ?>')" class="btn btn-primary"><?php echo e(get_phrase('Join')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php if(count($groups)>15): ?>
                    <a href="<?php echo e(route('all.group.view')); ?>" class="btn btn-secondary btn-lg d-block mt-3"><?php echo e(get_phrase('See More')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div><!--  Group Content Inner Col End -->
    
    <?php echo $__env->make('frontend.groups.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/groups/groups.blade.php ENDPATH**/ ?>