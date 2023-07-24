<form class="ajaxForm" action="<?php echo e(route('add.image.album')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" value="public" name="privacy" id="album_privacy">
    <?php if(isset($page_id)&&!empty($page_id)): ?>
      <input type="hidden" name="page_id" value="<?php echo e($page_id); ?>" id="page_id">
    <?php endif; ?>
  
    <?php if(isset($group_id)&&!empty($group_id)): ?>
    <input type="hidden" name="group_id" value="<?php echo e($group_id); ?>" id="group_id">
    <?php endif; ?>
    <?php if(isset($profile_id)&&!empty($profile_id)): ?>
    <input type="hidden" name="profile_id" value="<?php echo e($profile_id); ?>" id="profile_id">
    <?php endif; ?>
  
  <div class="mb-3 w-100 d-flex">
    <?php if(isset($page_id)&&!empty($page_id)): ?>
    <?php
      $page = \App\Models\Page::find($page_id);
    ?>
      <a href="<?php echo e(route('single.page',$page_id)); ?>" class="author-thumb d-flex align-items-center">
        <img src="<?php echo e(get_page_logo($page->logo, 'logo')); ?>" class="rounded-circle user_image_show_on_modal" alt="">
        <h6 class="ms-2"><?php echo e($page->title); ?></h6>
      </a>
    <?php elseif(isset($group_id)&&!empty($group_id)): ?>
      <?php
        $group = \App\Models\Group::find($group_id);
      ?>
        <a href="<?php echo e(route('single.group',$group_id)); ?>" class="author-thumb d-flex align-items-center">
          <img src="<?php echo e(get_group_logo($group->logo, 'logo')); ?>" class="rounded-circle user_image_show_on_modal" alt="">
          <h6 class="ms-2"><?php echo e($group->title); ?></h6>
        </a>
    <?php else: ?>
      <a href="<?php echo e(route('profile')); ?>" class="author-thumb d-flex align-items-center">
        <img src="<?php echo e(get_user_image('', 'optimized')); ?>" class="rounded-circle user_image_show_on_modal" alt="">
        <h6 class="ms-2"><?php echo e(auth()->user()->name); ?></h6>
      </a>
    <?php endif; ?>
  </div>

    <?php if(isset($group_id)): ?>
        <div class="mb-3">
            <label for="image" class="form-label"><?php echo e(get_phrase('Album')); ?></label>
            <select name="album" id="album" class="form-control bg-secondary">
            <option value="" selected disabled><?php echo e(get_phrase('Select Album')); ?></option>
            <?php $__currentLoopData = \App\Models\Albums::where('group_id',$group_id)->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($album->id); ?>"><?php echo e($album->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    <?php endif; ?>
    <?php if(isset($page_id)): ?>
        <div class="mb-3">
            <label for="image" class="form-label"><?php echo e(get_phrase('Album')); ?></label>
            <select name="album" id="album" class="form-control bg-secondary">
            <option value="" selected disabled><?php echo e(get_phrase('Select Album')); ?></option>
            <?php $__currentLoopData = \App\Models\Albums::where('page_id',$page_id)->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($album->id); ?>"><?php echo e($album->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    <?php endif; ?>
    <?php if(isset($profile_id)): ?>
    <label for="image" class="form-label"><?php echo e(get_phrase('Album')); ?></label>
    <select name="album" id="album" class="form-control bg-secondary">
      <option value="" selected disabled><?php echo e(get_phrase('Select Album')); ?></option>
      <?php $__currentLoopData = \App\Models\Albums::where('user_id',auth()->user()->id)->whereNull('page_id')->whereNull('group_id')->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($album->id); ?>"><?php echo e($album->title); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    <?php endif; ?>

    <div class="mb-3">
      <label for="image" class="form-label"><?php echo e(get_phrase('Album Images')); ?></label>
      <input type="file" multiple name="images[]" class="form-control" id="image">
    </div>
    
    <div class="mb-3">
      <button type="submit" class="btn btn-primary w-100"><?php echo e(get_phrase('Create')); ?></button>
    </div>
  </form>
  <?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('frontend.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/groups/album_image.blade.php ENDPATH**/ ?>