<?php 

    $media_files = \App\Models\Media_files::where('user_id', Auth()->user()->id)
    ->whereNull('story_id')
    ->whereNull('product_id')
    ->whereNull('page_id')
    ->whereNull('group_id')
    ->whereNull('chat_id')->take(9)->orderBy('id', 'desc')->get(); 

?>


<aside class="sidebar plain-sidebar">
    <div class="widget intro-widget">
        <h4><?php echo e(get_phrase('Intro')); ?></h4>

        <div class="my-about mb-3 text-center">
            <?php echo script_checker($user_info->about) ?>
        </div>
        <?php if(isset($type)&&$type=="my_account"): ?>
        <button onclick="toggleBio(this, '.edit-bio-form')" class="edit-bio-btn btn btn-primary w-100"><?php echo e(get_phrase('Edit Bio')); ?></button>
        <?php endif; ?>

        <form class="ajaxForm d-hidden edit-bio-form" action="<?php echo e(route('profile.about', ['action_type' => 'update'])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <textarea name="about" class="form-control"><?php echo e($user_info->about); ?></textarea>
            </div>
            <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100"><?php echo e(get_phrase('Save Bio')); ?></button>
            </div>
        </form>
    </div>
    <div class="widget" id="my-profile-info">
        <?php echo $__env->make('frontend.profile.my_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="widget">
        <h4 class="widget-title"><?php echo e(get_phrase('Photo')); ?>/<?php echo e(get_phrase('Video')); ?></h4>
        <div id="sidebarPhotoAndVideos" class="row row-cols-3 row-cols-md-5 row-cols-lg-2 row-cols-xl-3 g-1 mt-3">
            <?php echo $__env->make('frontend.profile.sidebar_photos_and_videos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <a href="<?php echo e(route('profile.photos')); ?>" class="btn btn-secondary mt-3 d-block mx-auto"><?php echo e(get_phrase('See More')); ?></a>
    </div>
    <!--  Widget End -->
    <div class="widget friend-widget">
        <?php
            $friends = DB::table('friendships')->where(function ($query) {
            $query->where('accepter', Auth()->user()->id)
                ->orWhere('requester', Auth()->user()->id);
            })
            ->where('is_accepted', 1)
            ->orderBy('friendships.importance', 'desc');
        ?>
        <div
            class="widget-header mb-3 d-flex justify-content-between align-items-center">
            <h4 class="widget-title"><?php echo e(get_phrase('Friends')); ?></h4>
            <span><?php echo e($friends->get()->count()); ?> <?php echo e(get_phrase('Friends')); ?></span>
        </div>

        <div class="row row-cols-3 g-1 mt-3">
            <?php $__currentLoopData = $friends->take(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($friend->requester == Auth()->user()->id): ?>
                    <?php $friends_user_data = DB::table('users')->where('id', $friend->accepter)->first(); ?>
                <?php else: ?>
                    <?php $friends_user_data = DB::table('users')->where('id', $friend->requester)->first(); ?>
                <?php endif; ?>
                <div class="col">
                    <a href="<?php echo e(route('user.profile.view',$friends_user_data->id)); ?>" class="friend d-block">
                        <img width="100%" src="<?php echo e(get_user_image($friends_user_data->photo, 'optimized')); ?>" alt="">
                        <h6 class="small"><?php echo e($friends_user_data->name); ?></h6>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a href="<?php echo e(route('profile.friends')); ?>" class="btn btn-secondary mt-3 d-block mx-auto"><?php echo e(get_phrase('See All')); ?></a href="<?php echo e(route('profile.friends')); ?>">
    </div>
    <!--  Widget End -->
    
    <!--  Widget End -->
</aside>
<!--  Sidebar End --><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/profile/profile_info.blade.php ENDPATH**/ ?>