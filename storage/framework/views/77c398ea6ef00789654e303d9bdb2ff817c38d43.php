<div class="main_content">

    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Translate your language')); ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>


	<div class="row g-3">
		<?php $__currentLoopData = $all_phrase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phrase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="card-title text-muted text-13px"><?php echo e($phrase->phrase); ?></div>
						<div class="input-group">
							<textarea class="form-control text-13px" id="phrase<?php echo e($phrase->id); ?>"><?php echo e($phrase->translated); ?></textarea>
							<button class="input-group-text btn btn-light text-13px" id="btn<?php echo e($phrase->id); ?>" onclick="updatePhrase('<?php echo e($phrase->id); ?>')"><?php echo e(get_phrase('Update')); ?></button>
						</div>
						<?php if(strpos($phrase->phrase, '____') == true): ?>
							<span class="text-10px badge bg-danger"><?php echo e(get_phrase("Don't remove ____")); ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>

<script type="text/javascript">
	function updatePhrase(id){
		$('#btn'+id).html('<?php echo e(get_phrase("Updating")); ?>...');
		let url = "<?php echo e(route('admin.languages.update.phrase', '')); ?>/"+id;
		let translatedVal = $('#phrase'+id).val();
		let csrfToken = "<?php echo e(csrf_token()); ?>";
		$.ajax({
			type:'post',
			url: url,
			data:{translated:translatedVal, _token:csrfToken},
			success: function(response){
				if(response == 1){
					$('#btn'+id).html('<span class="text-success"><?php echo e(get_phrase("Updated")); ?> !</span>');
				}else{
					$('#btn'+id).html('<?php echo e(get_phrase("Update")); ?>');
				}
			}
		});
	}
</script><?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/language/phrase_list.blade.php ENDPATH**/ ?>