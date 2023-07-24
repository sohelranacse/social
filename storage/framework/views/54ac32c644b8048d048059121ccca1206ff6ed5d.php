
    <form class="ajaxForm event-form" action="<?php echo e(route('event.store')); ?>" method="POST" enctype="multipart/form-data" >
        <?php echo csrf_field(); ?>
        <?php if(isset($group_id)): ?>
            <input type="hidden" value="<?php echo e($group_id); ?>" name="group_id" />
        <?php endif; ?>
        <div class="entry-header d-flex mb-10 justify-content-between">
            <div class="ava-info d-flex align-items-center">
                <div class="flex-shrink-0">
                    <img src="<?php echo e(get_user_image(Auth()->user()->photo, 'optimized')); ?>" class="user-round user_image_show_on_modal" alt="...">
                </div>
                <div class="ava-desc ms-2">
                    <h3 class="mb-0 h6"><?php echo e(Auth::user()->name); ?></h3>
                </div>
            </div>
            <div class="post-controls dropdown">
                <select name="privacy" id="privacy" class="form-control bg-secondary">
                    <option value="public"><?php echo e(get_phrase('Public')); ?></option>
                    <option value="private"><?php echo e(get_phrase('Private')); ?></option>
                </select>
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="#"><?php echo e(get_phrase('Event Name')); ?></label>
            <input type="text" name="eventname" placeholder="Enter your event name">
        </div>
        <div class="row">
            <div class="form-group col-md-6 col-lg-6 col-sm-12">
                <label for="#"><?php echo e(get_phrase('Event Date')); ?></label>
                <input type="date" name="eventdate" placeholder="Event Date">
            </div>
            <div class="form-group col-md-6 col-lg-6 col-sm-12">
                <label for="#"><?php echo e(get_phrase('Event Time')); ?></label>
                <input type="time" name="eventtime" placeholder="Event Time">
            </div>
        </div>
        <div class="form-group">
            <label for="#"><?php echo e(get_phrase('Location')); ?></label>
            <input type="text" name="eventlocation" placeholder="Enter your location">
        </div>
        <div class="form-group">
            <label for="#"><?php echo e(get_phrase('Event Description')); ?></label>
            <textarea name="description" class="content" id="description" cols="30" rows="10" placeholder="Description"> </textarea>
        </div>
        <div class="form-group">
            <label for="#"><?php echo e(get_phrase('Cover Photo')); ?></label>
            <div class="mb-3 mt-4 text-center">
                <input type="file" id="coverphoto" name="coverphoto" class="form-control w-100" name="profile_photo" accept="image/*">
            </div>
        </div>
        
        <div class="inline-btn mt-5">
            <button class="btn btn-primary w-100" type="submit" onclick="document.getElementById('description').value=CKEDITOR.instances.description.getData(); CKEDITOR.instances.description.destroy()"><?php echo e(get_phrase('Create Event')); ?></button>
        </div>
    </form>  

<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/events/create_event.blade.php ENDPATH**/ ?>