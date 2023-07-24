<!-- Content Section Start -->
<div class="event-page-wrap">
    <div
        class="d-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><i class="fa-solid fa-calendar-days"></i></span> <?php echo e(get_phrase('Events')); ?></h3>
        <div class="">
            <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.events.create_event'])); ?>', '<?php echo e(get_phrase('Create Event')); ?>');" data-bs-toggle="modal"
                data-bs-target="#createEvent" class="btn btn-primary btn-sm"> <i class="fa fa-plus-circle m-0"></i> <div class="d-none d-md-inline-block"><?php echo e(get_phrase('Create Event')); ?></div></a>
            <a href="<?php echo e(route('userevent')); ?>" class="btn btn-primary btn-sm"><?php echo e(get_phrase("My Event")); ?></a>
        </div>
    </div>
    
    <div class="event-wrap row" id="eventdata">
        <?php echo $__env->make('frontend.events.event-single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div>

</div>





<!-- Content Section End --><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/events/events.blade.php ENDPATH**/ ?>