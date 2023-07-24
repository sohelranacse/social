<div class="edit-profile__picture">
    <h5 class="pm-title"><?php echo e(get_phrase('Profile Picture')); ?></h5>
    <div class="profile-pic mx-auto">
        <img class="uploaded_place_here img-fluid rounded-circle" width="100%" src="<?php echo e(get_user_image(Auth()->user()->photo, 'optimized')); ?>">
    </div>

</div>

<form class="ajaxForm" action="<?php echo e(route('profile.update_profile')); ?>" method="post" enctype="multipart/form-data">
	<?php echo csrf_field(); ?>
	<div class="mb-3 mt-4 text-center">
		<input type="file" id="profile_photo" class="form-control w-50 ms-auto me-auto" name="profile_photo" accept="image/*">
	</div>
	<div class="row mb-3">
		<div class="col">
			<label for="name"><?php echo e(get_phrase('Name')); ?></label>
			<input value="<?php echo e(auth()->user()->name); ?>" id="name" name="name" type="text" class="form-control" placeholder="<?php echo e(get_phrase('Enter your name')); ?>" aria-label="Name" required>
		</div>
		<div class="col">
			<label for="nickname"><?php echo e(get_phrase('Nickname')); ?></label>
			<input value="<?php echo e(auth()->user()->nickname); ?>" id="nickname" name="nickname" type="text" class="form-control" placeholder="<?php echo e(get_phrase('Enter your nickname name')); ?>" aria-label="Nickname">
		</div>
	</div>

	<div class="mb-3">
		<label for="marital_status"><?php echo e(get_phrase('Marital status')); ?></label>
		<input value="<?php echo e(auth()->user()->marital_status); ?>" id="marital_status" name="marital_status" type="text" class="form-control" placeholder="<?php echo e(get_phrase('Enter your marital status')); ?>" aria-label="Marital status">
	</div>

	<div class="mb-3">
		<label for="phone"><?php echo e(get_phrase('Phone')); ?></label>
		<input value="<?php echo e(auth()->user()->phone); ?>" id="phone" name="phone" type="text" class="form-control" placeholder="<?php echo e(get_phrase('Enter your phone number')); ?>" aria-label="Phone numaber">
	</div>

	<div class="mb-3">
		<label for="date_of_birth"><?php echo e(get_phrase('Date of birth')); ?></label>
		<input value="<?php echo e(date('Y-m-d', auth()->user()->date_of_birth)); ?>" id="date_of_birth" name="date_of_birth" type="date" class="form-control" placeholder="<?php echo e(get_phrase('Your date of birth')); ?>" aria-label="Your date of birth" required>
	</div>

	<div class="mb-3 mt-5">
		<button class="btn btn-primary w-100" type="submit"><?php echo e(get_phrase('Update Profile')); ?></button>
	</div>
</form>

<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/profile/edit_profile.blade.php ENDPATH**/ ?>