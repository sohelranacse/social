
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Add a new page')); ?></h4>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-md-7">
        <div class="eSection-wrap-2">
            <div class="eForm-layouts">
              <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
              <form method="POST" action="<?php echo e(route('admin.page.created')); ?>" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="mb-3">
                    <label for="title" class="form-label eForm-label"><?php echo e(get_phrase('Page title')); ?></label>
                    <input type="text" class="form-control eForm-control" id="title" name="title" placeholder="Page title">
                  </div>

                  <div class="mb-3">
                      <label for="page_category" class="form-label eForm-label"><?php echo e(get_phrase('Select a category')); ?></label>
                      <select name="category" class="form-select eForm-control select2" required>
                        <option><?php echo e(get_phrase('Select a category')); ?></option>
                        <?php $__currentLoopData = DB::table('pagecategories')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>

                  <div class="mb-3">
                      <label for="description" class="form-label eForm-label"><?php echo e(get_phrase('Page details')); ?></label>
                      <textarea id="description" name="description" class="content"></textarea>
                  </div>

                  <div class="mb-3">
                      <label for="logo" class="form-label eForm-label"><?php echo e(get_phrase('Logo')); ?></label>
                      <input id="logo" class="form-control eForm-control-file" type="file" name="logo">
                  </div>

                  <div class="mb-3">
                      <label for="coverphoto" class="form-label eForm-label"><?php echo e(get_phrase('Cover photo')); ?></label>
                      <input id="coverphoto" class="form-control eForm-control-file" type="file" name="coverphoto">
                  </div>
                  
                  <button type="submit" class="btn btn-primary"><?php echo e(get_phrase('Submit')); ?></button>
              </form>
            </div>

        </div>
      </div>
    </div>
    <!-- Start Footer -->
    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->
  </div>



<?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/page/create.blade.php ENDPATH**/ ?>