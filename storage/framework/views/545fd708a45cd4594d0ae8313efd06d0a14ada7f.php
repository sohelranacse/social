<div class="row">
	<div class="col-lg-7">
		<div class="post-image-wrap pe-5 position-sticky top-30px">
            <div class="piv-gallery owl-carousel">
            	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	            	<?php $media_files = DB::table('media_files')->where('post_id', $post->post_id)->get(); ?>         
					<?php $__currentLoopData = $media_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <div class="piv-item video-player">
		                	<?php if($media_file->file_type == 'video'): ?>
								<?php if(File::exists('public/storage/post/videos/'.$media_file->file_name)): ?>
		                    		<video controlsList="nodownload" controls class="plyr-js w-100 rounded video-thumb" onplay="pauseOtherVideos(this)">
										<source src="<?php echo e(get_post_video($media_file->file_name)); ?>" type="">
									</video>
		                    	<?php endif; ?>
		                    <?php else: ?>
		                    	<img class="ms-auto me-auto img-fluid rounded" src="<?php echo e(get_post_image($media_file->file_name)); ?>" alt="">
		                    <?php endif; ?>
		                </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
	</div>
	<div class="col-lg-5">
		<div class="single-entry" id="postPreviewSection">
			<?php echo $__env->make('frontend.main_content.posts',['type'=>'user_post'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	"Use strict";

	$('#postMediaSection<?php echo e($post->post_id); ?>').hide();
	var postView = $('#postIdentification<?php echo e($post->post_id); ?>').html();
	$('#postPreviewSection').html(postView);
	$('#postIdentification<?php echo e($post->post_id); ?>').html('');

	function restorePostView(){
		var postView = $('#postPreviewSection').html();
		console.log(postView)
		$('#postIdentification<?php echo e($post->post_id); ?>').html(postView);
		$('#postPreviewSection').html('');
		$('#postMediaSection<?php echo e($post->post_id); ?>').show();
	}

	$('.piv-gallery').owlCarousel({
		loop: false,
		margin: 10,
		dots: false,
		nav: true,
		items: 1,
	});
</script>

<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/main_content/preview_post.blade.php ENDPATH**/ ?>