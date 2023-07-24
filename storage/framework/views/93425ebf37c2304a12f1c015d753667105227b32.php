<!-- Modal -->
<form class="ajaxForm" id="createPostForm" action="<?php echo e(route('create_post')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" id="post_privacy" name="privacy" value="public">
    <input type="hidden" id="post_type" name="post_type" value="general">
    <?php if(isset($event_id)): ?>
        <input type="hidden" id="event_id" name="event_id" value="<?php echo e($event_id); ?>"> 
        <input type="hidden" id="publisher" name="publisher" value="event"> 
    <?php endif; ?>
    <?php if(isset($page_id)): ?>
        <input type="hidden" id="page_id" name="page_id" value="<?php echo e($page_id); ?>"> 
        <input type="hidden" id="publisher" name="publisher" value="page"> 
    <?php endif; ?>

    <?php if(isset($group_id)): ?>
        <input type="hidden" id="group_id" name="group_id" value="<?php echo e($group_id); ?>"> 
        <input type="hidden" id="publisher" name="publisher" value="group"> 
    <?php endif; ?>

    <div class="modal fade" id="createPost" tabindex="-1" aria-labelledby="createPostLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(get_phrase('Create Post')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="entry-header d-flex justify-content-between">
                        <?php if(isset($page_id)&&!empty($page_id)): ?>
                            <?php
                                $page = \App\Models\Page::find($page_id);
                            ?>
                            <a href="<?php echo e(route('single.page',$page_id)); ?>" class="author-thumb d-flex align-items-center">
                                <img src="<?php echo e(get_page_logo($page->logo, 'logo')); ?>" width="40px" class="rounded-circle" alt="">
                                <h6 class="ms-2 mt-2"><?php echo e($page->title); ?></h6>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('profile')); ?>" class="author-thumb d-flex align-items-center">
                                <img src="<?php echo e(get_user_image($user_info->photo, 'optimized')); ?>" width="40px" class="rounded-circle" alt="">
                                <h6 class="ms-2 mt-2"><?php echo e($user_info->name); ?></h6>
                            </a>
                        <?php endif; ?>
                        <div class="entry-status">
                            <div class="dropdown">
                                <button class="btn btn-gray dropdown-toggle" type="button" id="postPrivacyDroupdownBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-earth-americas"></i> <?php echo e(get_phrase('Public')); ?>

                                </button>
                                <ul class="dropdown-menu" aria-labelledby="postPrivacyDroupdownBtn">
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('private', this, 'postPrivacyDroupdownBtn', 'post_privacy')"><i class="fa-solid fa-user"></i> <?php echo e(get_phrase('Only Me')); ?></a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('friends', this, 'postPrivacyDroupdownBtn', 'post_privacy')"><i class="fa-solid fa-users"></i> <?php echo e(get_phrase('Friends')); ?></a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="post_privacy('public', this, 'postPrivacyDroupdownBtn', 'post_privacy')"><i class="fa-solid fa-user-group"></i> <?php echo e(get_phrase('Public')); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <textarea name="description" id="post_article" placeholder="<?php echo e(get_phrase("What's on your mind ____", [auth()->user()->name])); ?>?"></textarea>

                    <div id="tab-file" class="post-inner file-tab cursor-pointer p-0 mt-2">
                        <span class="close-btn z-index-2000"><i class="fa fa-close"></i></span>

                        <!--Uploader start-->
                        <div class="file-uploader">
                            <label for="multiFileUploader">
                                <i class="fa-solid fa-cloud-arrow-up text-secondary"></i>
                                <p><?php echo e(get_phrase('Click to browse')); ?></p>
                            </label>
                            <input type="file" class="fileUploader position-absolute visibility-hidden" name="multiple_files[]" id="multiFileUploader" accept=".jpg,.jpeg,.png,.gif,.mp4,.mov,.wmv,.avi,.mkv,.webm" multiple/>
                            <div class="preview-files">
                                <div class="row justify-content-start px-3"></div>
                            </div>
                        </div>
                        <!--Uplodaer end-->

                    </div>

                    <div class="post-inner py-3" id="tab-tag">
                        <h4 class="h5"> <a href="javascript:void(0)" onclick="$('#tab-tag').removeClass('current')" class="prev-btn"><i class="fa fa-long-arrow-left"></i></a><?php echo e(get_phrase('Tag People')); ?>

                        </h4>
                        <div class="tag-wrap">
                            
                            <div class="post-tagged">
                                <h4><?php echo e(get_phrase('Tagged')); ?></h4>
                                <div class="tag-card" id="taggedUsers"></div>
                                <div class="suggesions">
                                    <input class="mt-3" onkeyup="searchFriendsForTagging(this, '#friendsForTagging')" type="search" placeholder="<?php echo e(get_phrase('Search more peoples')); ?>">
                                    <h4><?php echo e(get_phrase('Suggestions')); ?></h4>

                                    <div class="progress suggestions-loaging-bar d-none"><div class="indeterminate"></div></div>

                                    <div class="tag-peoples" id="friendsForTagging">
                                        <?php $friends = DB::table('users')->whereJsonContains('friends', [Auth()->user()->id])->take(5)->get(); ?>
                                        <?php echo $__env->make('frontend.main_content.friend_list_for_tagging', array('friends' => $friends), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>

                        </div><!-- Tag People End -->
                    </div>

                    <?php echo $__env->make('frontend.main_content.create_post_felling_and_activity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('frontend.main_content.create_post_location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <!-- Location Tab End -->
                    <div class="modal-footer text-center justify-content-center p-3">
                        <button type="button" data-tab="tab-file" class="btn btn-secondary"><img
                                src="<?php echo e(asset('storage/images/image.svg')); ?>" alt="photo"><?php echo e(get_phrase('Photo')); ?>/<?php echo e(get_phrase('Video')); ?></button>

                        <button type="button" data-tab="tab-tag" class="btn btn-secondary"><img
                                src="<?php echo e(asset('storage/images/peoples.png')); ?>" alt="photo"><?php echo e(get_phrase('Tag People')); ?></button>
                        <button type="button" data-tab="tab-feeling" class="btn btn-secondary"><img
                                src="<?php echo e(asset('storage/images/forum.svg')); ?>" alt="photo"><?php echo e(get_phrase('Feelings')); ?> / <?php echo e(get_phrase('Activity')); ?></button>
                        <button type="button" onclick="loadMaps('map')" data-tab="tab-location" class="btn btn-secondary"><img
                                src="<?php echo e(asset('storage/images/location.png')); ?>" alt="photo"><?php echo e(get_phrase('Location')); ?></button>
                        <button type="button" class="btn btn-secondary" onclick="confirmLiveStreaming()"><img src="<?php echo e(asset('storage/images/camera.svg')); ?>"
                                alt="photo"><?php echo e(get_phrase('Live Video')); ?></button>
                        <button type="submit" class="btn btn-primary mt-3 rounded w-100 btn-lg"><?php echo e(get_phrase('Publish')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Create Post Modal End -->
</form>
<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/main_content/create_post_modal.blade.php ENDPATH**/ ?>