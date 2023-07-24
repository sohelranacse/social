<?php $__currentLoopData = $all_albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="single-item-countable col-6 col-md-4 col-lg-12 col-xl-6" id="photoAlbum<?php echo e($album->id); ?>">
        <div class="card album-card" >
            <div class="mb-2 position-relative"><img
                    src="<?php echo e(get_album_thumbnail($album->id, 'optimized')); ?>"
                    class="rounded img-fluid" alt="">
                <div class="post-controls dropdown dotted">
                    <a class="nav-link dropdown-toggle" href="#"
                        id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu"
                        aria-labelledby="navbarDropdown">
                        <li>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.groups.show_album','album_id'=>$album->id])); ?>', '<?php echo e(get_phrase('View Album')); ?>');"> <?php echo e(get_phrase('View Album')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="dropdown-item" onclick="confirmAction('<?php echo e(route('profile.album', ['action_type' => 'delete', 'album_id' => $album->id])); ?>', true);"  > <?php echo e(get_phrase('Delete Album')); ?>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-details">
                <h6><a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.groups.show_album','album_id'=>$album->id])); ?>', '<?php echo e(get_phrase('View Album')); ?>');"><?php echo e($album->title); ?></a></h6>
                <span class="mute"><?php echo e(DB::table('album_images')->where('album_id', $album->id)->get()->count()); ?> <?php echo e(get_phrase('Items')); ?></span>
            </div>
        </div>
    </div> <!-- Card End -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/profile/album_single.blade.php ENDPATH**/ ?>