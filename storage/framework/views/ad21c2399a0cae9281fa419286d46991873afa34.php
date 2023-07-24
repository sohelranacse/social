<div class="col-lg-5">
        <aside class="sidebar plain-sidebar">
            <div class="widget">
                    <button class="btn btn-primary d-block w-100" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.groups.create'])); ?>', '<?php echo e(get_phrase(' Create New Group')); ?>');" data-bs-toggle="modal"
                        data-bs-target="#newGroup"><i class="fa fa-plus-circle"></i><?php echo e(get_phrase(' Create New Group')); ?></button>
            </div>
            <div class="widget">
                <div class="gr-search">
                    <h3 class="h6"><?php echo e(get_phrase('Groups')); ?></h3>
                    <form action="<?php echo e(route('search.group')); ?>">
                        <input type="text" class="bg-secondary rounded" name="search" value="<?php if(isset($_GET['search'])): ?> <?php echo e($_GET['search']); ?> <?php endif; ?>" placeholder="Search Group">
                        <span class="i fa fa-search"></span>
                    </form>
                </div>
            </div><!--  Widget End -->

            <div class="widget group-widget">
                <h3 class="widget-title"><?php echo e(get_phrase('Group you Manage')); ?></h3>
                    <?php $__currentLoopData = $managegroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $managegroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex align-items-center mt-3">
                            <div class="widget-img">
                                <img src="<?php echo e(get_group_logo($managegroup->logo,'logo')); ?>" alt="" class="img-fluid img-radisu">
                            </div>
                            <div class="widget-info ms-2">
                                <h6><a href="<?php echo e(route('single.group',$managegroup->id)); ?>"><?php echo e($managegroup->title); ?></a></h6>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($managegroups)>8): ?>
                        <a href="<?php echo e(route('group.user.created')); ?>" class="btn btn-primary mt-3 d-block w-100"><?php echo e(get_phrase('See All')); ?></a>
                    <?php endif; ?>
            </div> <!-- Widget End -->
            <div class="widget group-widget">
                <h3 class="widget-title"><?php echo e(get_phrase('Group you Joined')); ?></h3>
                    <?php $__currentLoopData = $joinedgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $joinedgroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex align-items-center mt-3">
                            <div class="widget-img">
                                <img src="<?php echo e(get_group_logo($joinedgroup->getGroup->logo,'logo')); ?>" alt="" class="img-fluid img-radisu">
                            </div>
                            <div class="widget-info ms-2">
                                <h6><a href="<?php echo e(route('single.group',$joinedgroup->group_id)); ?>"> <?php echo e($joinedgroup->getGroup->title); ?> </a></h6>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($joinedgroups)>8): ?>
                        <a href="<?php echo e(route('group.user.joined')); ?>" class="btn btn-primary mt-3 d-block w-100"><?php echo e(get_phrase('See All')); ?></a>
                    <?php endif; ?>
            </div> <!-- Widget End -->
        </aside>
    </div> <!-- Group Sidebar End --><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/groups/right-sidebar.blade.php ENDPATH**/ ?>