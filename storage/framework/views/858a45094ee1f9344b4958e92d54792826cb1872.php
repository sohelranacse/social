<div class="row rightSideBarToggler d-hidden">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body text-end">
                <button class="btn" onclick="toggleRightSideBar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<aside class="sidebar mt-0 sidebarToggle d-hidden" id="sidebarToggle">
    <div class="widget">
        <div class="d-flex align-items-center">
            <?php  
                        
                $tz = auth()->user()->timezone;
                if(!empty($tz)){
                    $timestamp = time();
                    $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
                    $dt->setTimestamp($timestamp);
                    $current_hour = $dt->format('H');
                }else{
                    $current_hour = date('H', time());
                }
            ?>
            
            <?php if($current_hour >= 5 && $current_hour < 12): ?>
                <img class="img-fluid" src="<?php echo e(asset('assets/frontend/images/m-sun.png')); ?>"  height="30px" width="30px" alt="">
            <?php elseif($current_hour >= 12 && $current_hour < 17): ?>
                <img class="img-fluid" src="<?php echo e(asset('storage/images/cloud-sun.png')); ?>" alt="">
            <?php else: ?>
                <img class="img-fluid" src="<?php echo e(asset('assets/frontend/images/moon.png')); ?>" height="30px" width="30px" alt="">
            <?php endif; ?>
            <h3 class="h6 ms-2"><?php echo e(get_phrase('Hi')); ?>, <?php echo e(Auth()->user()->name); ?>

                <?php if($current_hour >= 5 && $current_hour < 12): ?>
                    <span class="d-block text-primary"><?php echo e(get_phrase('Good Morning')); ?>!</span>
                <?php elseif($current_hour >= 12 && $current_hour < 17): ?>
                    <span class="d-block text-primary"><?php echo e(get_phrase('Good Afternoon')); ?>!</span>
                <?php else: ?>
                    <span class="d-block text-primary"><?php echo e(get_phrase('Good Evening')); ?>!</span>
                <?php endif; ?>
            </h3>
        </div>
    </div> <!-- Widget End -->
    <div class="widget">
        <div class="d-flex align-items-center justify-content-between">
            <h3 class="widget-title"><?php echo e(get_phrase('Sponsored')); ?> </h3>
            
        </div>
        <div class="sponsors">
            <?php

                $sponsorPost = \App\Models\Sponsor::orderBy('id','desc')

                ->where(function($query){
                    $query->where('start_date', '<', date('Y-m-d H:i:s'))
                    ->orWhere(function($query){
                        $query->where('start_date', '=', date('Y-m-d H:i:s'))
                        ->whereTime('start_date', '<=', date('Y-m-d H:i:s'));
                    });
                })
                ->where(function($query){
                    $query->where('end_date', '>', date('Y-m-d H:i:s'))
                    ->orWhere(function($query){
                        $query->where('end_date', '=', date('Y-m-d H:i:s'))
                        ->whereTime('end_date', '>=', date('Y-m-d H:i:s'));
                    });
                })
                ->where('status', 1)
                ->limit('5')->get();
            ?>
            <?php $__currentLoopData = $sponsorPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a target="_blank" href="<?php echo e($sponsor->ext_url); ?>">
                <div class="sponsor d-flex d-md-block d-xl-flex align-items-center border mb-1 text-lg-center text-xl-start">
                    <img src="<?php echo e(get_sponsor_image($sponsor->image,'thumbnail')); ?>"  class="sponsor_post_image_size ms-2 ms-lg-0 ms-xl-2 mt-2 mt-xl-0" alt="">
                    <div class="sponsor-txt ms-2 pt-2">
                        <h6><?php echo e(ellipsis($sponsor->name,30)); ?></h6>
                        <p class="ellipsis-line-3 pe-2 text-dark"><?php echo e(ellipsis(strip_tags($sponsor->description,100))); ?></p>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div> <!-- Widget End -->
    <div class="widget">
        <div class="d-flex align-items-center justify-content-between">
            <h3 class="widget-title"><?php echo e(get_phrase('Active users')); ?> </h3>
            <div class="d-flex align-items-center widget-controls">
                
            </div>
        </div>
        <div class="contact-lists mt-3">
            <?php
                $friends = \App\Models\Friendships::where(function ($query) {
                                $query->where('accepter', auth()->user()->id)
                                    ->orWhere('requester', auth()->user()->id);
                            })
                    ->where('is_accepted', 1)->get();
            ?>
            <?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($friend->requester==auth()->user()->id): ?>
                    <?php if($friend->getFriendAccepter->isOnline()): ?>
                        <?php if($friend->getFriendAccepter->id !=auth()->user()->id): ?>
                        <div class="single-contact d-flex align-items-center justify-content-between">
                            <div class="avatar d-flex">
                                <a href="<?php echo e(route('chat',$friend->getFriendAccepter->id)); ?>" class="d-flex align-items-center">
                                    <div class="avatar me-2">
                                        <img src="<?php echo e(get_user_image($friend->getFriendAccepter->photo,'optimized')); ?>" class="rounded-circle w-45px" alt="">
                                        <span class="online-status active"></span>
                                    </div>
                                    <h4><?php echo e($friend->getFriendAccepter->name); ?></h4>
                                </a>
                            </div>
                            <div class="login-time">

                            </div>
                        </div> 
                        <?php endif; ?>    
                    <?php endif; ?>
                <?php else: ?>
                    <?php if($friend->getFriend->isOnline()): ?>
                        <?php if($friend->getFriend->id !=auth()->user()->id): ?>
                        <div class="single-contact d-flex align-items-center justify-content-between">
                            <div class="avatar d-flex">
                                <a href="<?php echo e(route('chat',$friend->getFriend->id)); ?>" class="d-flex align-items-center">
                                    <div class="avatar me-2">
                                        <img src="<?php echo e(get_user_image($friend->getFriend->photo,'optimized')); ?>" class="rounded-circle w-45px" alt="">
                                        <span class="online-status active"></span>
                                    </div>
                                    <h4><?php echo e($friend->getFriend->name); ?></h4>
                                </a>
                            </div>
                            <div class="login-time">

                            </div>
                        </div> 
                        <?php endif; ?>    
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div> <!-- Widget End -->
</aside>



<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/right_sidebar.blade.php ENDPATH**/ ?>