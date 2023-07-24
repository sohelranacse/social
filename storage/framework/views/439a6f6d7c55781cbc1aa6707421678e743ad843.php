<div class="profile-cover group-cover rounded mb-3">
    <?php echo $__env->make('frontend.groups.cover-photo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="group-content profile-content">
    <div class="row gx-3">
        <div class="col-lg-7 col-sm-12">
            <?php echo $__env->make('frontend.groups.iner-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- People Nav End -->
            <div class="people-wrap p-3 border bg-white">
                <div class="member-entry gr-search">
                    <h3 class="h6 mb-0 fw-7"><?php echo e(get_phrase('Members')); ?> <?php echo e($total_member); ?></h3>
                    <p><?php echo e(get_phrase('New people and Pages who join this group will appear here')); ?></p>
                   
                    <?php $__currentLoopData = $recent_team_member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_team_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="entry-header d-flex justify-content-between py-3 border-bottom">
                            <div class="ava-info d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="<?php echo e(get_user_image($recent_team_member->getUser->photo,'optimized')); ?>" class="circle rounded-circle user_image_show_on_modal" alt="...">
                                </div>
                                <div class="ava-desc ms-2">
                                    <h3 class="mb-0 h6"><?php echo e($recent_team_member->getUser->name); ?></h3>
                                    <span class="meta-time text-muted"><?php echo e($recent_team_member->getUser->username); ?></span>
                                </div>
                            </div>
                            <?php if($recent_team_member->user_id==auth()->user()->id): ?>
                            <div class="post-controls dropdown dotted">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="ajaxAction('<?php echo route('group.rjoin',$group->id); ?>')">
                                            <?php echo e(get_phrase('Leave Group')); ?></a></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('all.people.group.view',$group->id)); ?>" class="btn d-block mt-4 btn-secondary"><?php echo e(get_phrase('See More')); ?></a>
                </div> <!-- Member Entry End -->
                <div class="group-friend mt-4">
                    <h3 class="h6 fw-7 mb-4"><?php echo e(get_phrase('Friends')); ?> <?php echo e($friends_count); ?></h3>
                    <div class="gr-wrap mt-3">
                        <?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($friend->getFriend->id==auth()->user()->id): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                            <div class="single-friend gap-3 d-flex align-items-start">
                                <div class="avatar"><a href="#"><img class="img-fluid rounded-circle rounded-circle"
                                    src="<?php echo e(get_user_image($friend->getFriend->id,'optimized')); ?>" alt=""></a></div>
                                <h3><a href="#"><?php echo e($friend->getFriend->name); ?></a> <span><?php echo e($friend->getFriend->username); ?></span></h3>
                                <a href="<?php echo e(route('chat',$friend->getFriend->id)); ?>" class="btn btn-secondary ms-auto"><img src="<?php echo e(asset('assets/frontend/images/message-b.png')); ?>" alt="message">Message</a>
                            </div> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div> <!-- Group Friend End -->
                <div class="group-friend mt-5">
                    <h3 class="h6 fw-7 mb-4"><?php echo e(get_phrase('Members With Things in Common')); ?></h3>
                    <div class="gr-wrap mt-3">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-friend gap-3 d-flex align-items-start">
                                <div class="avatar"><a href="#"><img class="img-fluid rounded-circle"
                                    src="<?php echo e(get_user_image($user->photo,'optimized')); ?>" alt=""></a></div>
                                <h3><a href="#"><?php echo e($user->name); ?></a> <span><?php echo e($user->username); ?></span></h3>
                                <?php
                                    $user_id = $user->id;
                                    $friend = \App\Models\Friendships::where(function($query) use ($user_id){
                                        $query->where('requester', auth()->user()->id);
                                        $query->where('accepter', $user_id);
                                    })
                                    ->orWhere(function($query) use ($user_id) {
                                        $query->where('accepter', auth()->user()->id);
                                        $query->where('requester', $user_id);
                                    })
                                    ->count();
                                ?>
                                <?php if($friend>0): ?>
                                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.unfriend',$user->id); ?>')" class="btn btn-primary ms-auto"><i class="fa-solid fa-xmark"></i> <?php echo e(get_phrase('Cancel')); ?></a>
                                <?php else: ?>   
                                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('user.friend',$user->id); ?>')" class="btn btn-secondary ms-auto"><i class="fa-solid fa-plus"></i> <?php echo e(get_phrase('Add Friend')); ?> </a>
                                <?php endif; ?>
                            </div> <!-- Add Friend End -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div> <!-- Group Friend End -->
            </div>
            <!--  Single Entry End -->
        </div> <!-- COL END -->
        <!--  Group Content Inner Col End -->
        <?php echo $__env->make('frontend.groups.bio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div><!-- Group content End --><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/groups/people.blade.php ENDPATH**/ ?>