<script type="text/javascript">
	"use strict";

	function alert_message(message){
	    $.toast({
	        content: message,
	        position: "bottom-left"
	    })
	}
</script>

<?php if($message = Session::get('success_message')): ?>
	<script>
		"use strict";

		alert_message("<?php echo e($message); ?>");
	</script>
	<?php Session()->forget('success_message'); ?>
<?php endif; ?>

<?php if($message = Session::get('info_message')): ?>
	<script>
		"use strict";

		alert_message("<?php echo e($message); ?>");
	</script>
	<?php Session()->forget('info_message'); ?>
<?php endif; ?>

<?php if($message = Session::get('error_message')): ?>
	<script>
		"use strict";

		alert_message("<?php echo e($message); ?>");
	</script>
	<?php Session()->forget('error_message'); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/toaster.blade.php ENDPATH**/ ?>