<div class="main_content">

    <!-- Mani section header and breadcrumb -->
    <div class="mainSection-title">
      <div class="row">
        <div class="col-12">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap gr-15"
          >
            <div class="d-flex flex-column">
              <h4><?php echo e(get_phrase('Languages')); ?></h4>
            </div>

            <div class="export-btn-area">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                <?php echo e(get_phrase('Add new language')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Admin area -->
    <div class="row">
      <div class="col-sm-12 col-lg-12">
        <div class="eSection-wrap-2">
            <!-- Filter area -->
            <div class="table-responsive">
              <table class="table eTable">
                <thead>
                  <tr>
                    <th scope="col"><?php echo e(get_phrase('Sl No')); ?></th>
                    <th scope="col"><?php echo e(get_phrase('Name')); ?></th>
                    <th scope="col"><?php echo e(get_phrase('Action')); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <th scope="row">
                          <p class="row-number"><?php echo e(++$key); ?></p>
                          </th>
                          <td>
                          <div class="dAdmin_info_name min-w-100px">
                              <p><span class="text-capitalize"><?php echo e($language->name); ?></span></p>
                          </div>
                          </td>
                          <td>
                            <div class="adminTable-action m-0">
                              <button type="button" class="btn btn-rounded btn-outline-secondary custom_button_action_padding" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                                <li>
                                  <a class="dropdown-item" href="<?php echo e(route('admin.languages.edit.phrase', $language->name)); ?>"><?php echo e(get_phrase('Edit phrase')); ?></a>
                                </li>
                                
                                <li>
                                  <a class="dropdown-item" onclick="ajaxModal('<?php echo e(route('load_modal_content', ['view_path'=>'backend.admin.language.language_edit','language' => $language->name])); ?>', '<?php echo e(get_phrase('Edit language')); ?>')" href="javascript:;"><?php echo e(get_phrase('Edit language')); ?></a>
                                </li>

                                <?php if($language->name != 'english'): ?>
                                  <li>
                                    <a class="dropdown-item" href="#"><?php echo e(get_phrase('Delete')); ?></a>
                                  </li>
                                <?php endif; ?>
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
    <!-- Start Footer -->
    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->
  </div>


  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(get_phrase('Add Language')); ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('admin.language.create')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="language" class="eForm-label"><?php echo e(get_phrase('Language')); ?></label>
                <input type="text" class="form-control eForm-control" required id="language" name="language" placeholder="Enter your language name">
              </div>
            <button type="submit" class="btn btn-primary"><?php echo e(get_phrase('Add')); ?></button>
          </form>
        </div>
        
      </div>
    </div>
  </div>


<?php /**PATH D:\xampp\htdocs\social\resources\views/backend/admin/language/lang.blade.php ENDPATH**/ ?>