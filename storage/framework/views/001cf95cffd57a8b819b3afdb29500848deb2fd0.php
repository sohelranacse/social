<?php $__currentLoopData = $friend_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend_request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php $requester_user_data = DB::table('users')->where('id', $friend_request->requester)->first(); ?>
		
	<?php
	$number_of_friend_friends = json_decode($requester_user_data->friends);
	$number_of_my_friends = json_decode($user_info->friends);
	
	if(!is_array($number_of_friend_friends)) $number_of_friend_friends = array();
    if(!is_array($number_of_my_friends)) $number_of_my_friends = array();

	$number_of_mutual_friends = count(array_intersect($number_of_friend_friends, $number_of_my_friends));
	?>
	<div class="single-item-countable col-6" id="friendRequest<?php echo e($requester_user_data->id); ?>">
	    <div class="card">
	        <div class="mb-2"><img src="<?php echo e(get_user_image($requester_user_data->photo, 'optimized')); ?>" class="rounded img-fluid" alt=""></div>
	        <div class="card-details">
	            <h6><a href="<?php echo e(route('user.profile.view', $requester_user_data->id)); ?>"><?php echo e($requester_user_data->name); ?></a></h6>
	            <span class="mute"><?php echo e($number_of_mutual_friends); ?> <?php echo e(get_phrase('Mutual Friends')); ?></span>
	            <div class="card-control">
	            	<form class="ajaxForm" action="<?php echo e(route('profile.accept_friend_request')); ?>" method="post">
	            		<?php echo csrf_field(); ?>
	            		<input type="hidden" name="user_id" value="<?php echo e($requester_user_data->id); ?>">
	                	<button type="submit" id="friendRequestConfirmBtn<?php echo e($requester_user_data->id); ?>" class="btn btn-primary w-100"><?php echo e(get_phrase('Confirm')); ?></button>
	                	<button type="button" id="friendRequestAcceptedBtn<?php echo e($requester_user_data->id); ?>" class="btn btn-secondary w-100 d-hidden"><?php echo e(get_phrase('Accepted')); ?></button>
	                </form>
	                <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('profile.delete_friend_request', ['user_id' => $requester_user_data->id]); ?>', true)" class="btn btn-secondary d-block"><?php echo e(get_phrase('Delete')); ?></a>
	            </div>
	        </div>
	    </div>
	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/profile/friend_requests_single_data.blade.php ENDPATH**/ ?>