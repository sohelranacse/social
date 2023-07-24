<div class="profile-cover group-cover rounded mb-3">
    <?php echo $__env->make('frontend.groups.cover-photo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="group-content profile-content">
    <div class="row gx-3">
        <div class="col-lg-7 col-sm-12">
            <?php echo $__env->make('frontend.groups.iner-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- People Nav End -->
            <div class="people-wrap bg-white">
                
                <div class="group-content">
                    <div class="card group-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between p-3">
                                <h3 class="h6 fw-7 m-0"><?php echo e(get_phrase('Media')); ?></h3>
                                <div class="gap-2">
                                    <!-- Button trigger modal -->
                                    <a onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.profile.album_create_form','group_id'=>$group->id])); ?>', '<?php echo e(get_phrase('Create Album')); ?>');" data-bs-toggle="modal" data-bs-target="#albumModal"
                                        class="btn btn-primary"> <?php echo e(get_phrase('Create Album')); ?>

                                    </a>
                                    <a onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.groups.album_image','group_id'=>$group->id])); ?>', '<?php echo e(get_phrase('Add Photo To Album')); ?>');" data-bs-toggle="modal" data-bs-target="#albumCreateModal"
                                        class="btn btn-primary"> <?php echo e(get_phrase('Add Photo/Album')); ?>

                                    </a>
                                </div>
                            </div>
                            <ul class="nav ct-tab" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="g-photo-tab" data-bs-toggle="tab"
                                        data-bs-target="#g-photo" type="button" role="tab"
                                        aria-controls="g-photo" aria-selected="true"><?php echo e(get_phrase('Photo')); ?></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="g-video-tab" data-bs-toggle="tab"
                                        data-bs-target="#g-video" type="button" role="tab"
                                        aria-controls="g-video" aria-selected="false"><?php echo e(get_phrase('Videos')); ?></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="g-album-tab" data-bs-toggle="tab"
                                        data-bs-target="#g-album" type="button" role="tab"
                                        aria-controls="g-album" aria-selected="false"><?php echo e(get_phrase('Albums')); ?></button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active photoGallery" id="g-photo" role="tabpanel"
                                    aria-labelledby="g-photo-tab">
                                    <?php echo $__env->make('frontend.profile.photo_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="tab-pane fade g-video text-center" id="g-video" role="tabpanel"
                                    aria-labelledby="g-video-tab">
                                    <?php echo $__env->make('frontend.profile.video_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div><!--  Group Video End -->
                                <div class="tab-pane fade" id="g-album" role="tabpanel"
                                    aria-labelledby="g-album-tab">
                                    <div class="row" id="group-album-row">
                                        <div class="col-create-album col-12 col-md-4 col-lg-12 col-xl-6">
                                            <div class="card album-create-card">
                                                <a onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.profile.album_create_form','group_id'=>$group->id])); ?>', '<?php echo e(get_phrase('Create Album')); ?>');" class="create-album">
                                                    <i class="fa fa-circle-plus"></i>
                                                </a>
                                                <h4 class="h6"><?php echo e(get_phrase('Create Album')); ?></h4>
                                            </div>
                                        </div> <!-- Card End -->
                                        <?php echo $__env->make('frontend.profile.album_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div><!--  Group Album End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Single Entry End -->
        </div> <!-- COL END -->
        <!--  Group Content Inner Col End -->
        <?php echo $__env->make('frontend.groups.bio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div><!-- Group content End --><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/groups/photos.blade.php ENDPATH**/ ?>