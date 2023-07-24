<form action="<?php echo e(route('admin.languages.update', $language)); ?>" method="POST">
<?php echo csrf_field(); ?>
<div class="mb-3">
    <label for="language" class="eForm-label"><?php echo e(get_phrase('Language')); ?></label>
    <input type="text" class="form-control eForm-control text-capitalize" value="<?php echo e($language); ?>" required id="language" name="language" placeholder="Language">
  </div>
<button type="submit" class="btn btn-primary"><?php echo e(get_phrase('Save changes')); ?></button>
</form><?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/language/language_edit.blade.php ENDPATH**/ ?>