

<div class="page-wrap">
    <div class="d-md-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><i class="fa-solid fa-file-video"></i></span> <?php echo e(get_phrase('Watch')); ?></h3>
        <div class="w-80 text-center">
            <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.video-shorts.create'])); ?>', '<?php echo e(get_phrase('Create Video & Shorts ')); ?>');" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="" class="btn btn-primary"> <i class="fa-solid fa-plus-circle me-2"></i><?php echo e(get_phrase('Create')); ?></a>
            
            <a href="<?php echo e(route('videos')); ?>" class="btn btn-primary"><i class="fa-solid fa-clapperboard me-2"></i><?php echo e(get_phrase('Videos')); ?></a>
            <a href="<?php echo e(route('shorts')); ?>" class="btn btn-primary"><i class="fa-solid fa-clapperboard me-2"></i><?php echo e(get_phrase('Shorts')); ?></a>
            <a href="<?php echo e(route('save.all.view')); ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Saved Video"><span><i class="fa-solid fa-bookmark"></i></span></a>
        </div>
    </div>
    <div class="video-box" id="shortsShowed">
        <?php echo $__env->make('frontend.video-shorts.shorts-single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/video-shorts/shorts.blade.php ENDPATH**/ ?>