
<div class="main_content">
    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('All Page Categories')); ?></h4>
              
            </div>
            <div class="export-btn-area">
              <a href="<?php echo e(route('admin.create.category')); ?>" class="export_btn" data-bs-toggle="tooltip" data-bs-placement="top"
              data-bs-custom-class="custom-tooltip"
              data-bs-title="Create Page Category"><?php echo e(get_phrase('Create')); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-12">
        <div class="eSection-wrap-2">
          <!-- Filter area -->
          <div class="table-responsive">
            <table class="table eTable " id="">
              <thead>
                <tr>
                  <th scope="col"><?php echo e(get_phrase('Sl No')); ?></th>
                  <th scope="col"><?php echo e(get_phrase('Category Name')); ?></th>
                  <th scope="col"><?php echo e(get_phrase('DATE')); ?></th>
                  <th scope="col" class="text-center"><?php echo e(get_phrase('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row">
                        <p class="row-number"><?php echo e(++$key); ?></p>
                        </th>
                        <td>
                        <div class="dAdmin_info_name min-w-100px">
                            <p><span><?php echo e($category->name); ?></span></p>
                        </div>
                        </td>
                        <td>
                        <div class="dAdmin_info_name min-w-100px">
                            <p><?php echo e(date( "d-m-y", strtotime($category->created_at))); ?></p>
                        </div>
                        </td>
                        
                        <td class="text-center">

                          <div class="adminTable-action me-auto">
                            <button type="button" class="eBtn eBtn-black dropdown-toggle table-action-btn-2" data-bs-toggle="dropdown" aria-expanded="false">
                              <?php echo e(get_phrase('Actions')); ?>

                            </button>
                            <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                              <li><a class="dropdown-item" href="<?php echo e(route('admin.edit.category',$category->id)); ?>"><?php echo e(get_phrase('Edit')); ?></a></li>
                              <li><a class="dropdown-item" onclick="return confirm('<?php echo e(get_phrase('Are You Sure Want To Delete?')); ?>')" href="<?php echo e(route('admin.delete.category',$category->id)); ?>"><?php echo e(get_phrase('Delete')); ?></a></li>
                            </ul>
                          </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End Admin area -->

   
    <!-- Start Footer -->
    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->
  </div>



<?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/page_category/index.blade.php ENDPATH**/ ?>