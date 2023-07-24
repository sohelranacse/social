
                
<div class="marketplace-wrap">
    <div class="d-md-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><i class="fa-solid fa-calendar-days"></i></span> <?php echo e(get_phrase('Marketplace')); ?></h3>
        <div class="">
                <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.marketplace.create_product'])); ?>', '<?php echo e(get_phrase('Create Product')); ?>');" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#createProduct" class="btn btn-primary"> <i class="fa fa-plus-circle"></i></a>
            <a href="<?php echo e(route('userproduct')); ?>" class="btn btn-primary mx-1"><?php echo e(get_phrase('My Products')); ?></a>
            <a href="<?php echo e(route('product.saved')); ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo e(get_phrase('Saved Product')); ?>"><?php echo e(get_phrase('Saved')); ?></a>
        </div>
    </div>
    <div class="product-form border mb-3 bg-white p-3 rounded">
        
        
        <div class="product-filter mt-3">
            
            <form method="GET" action="<?php echo e(route('filter.product')); ?>" class=" row">
                <div class="form-group">
                    <input type="search" class="submit_on_enter" name="search" value="<?php if(isset($_GET['search']) && $_GET['search']!="" ): ?><?php echo e($_GET['search']); ?><?php endif; ?>" class="bg-secondary rounded" placeholder="Type To Search">
                </div>
                <h3 class="sub-title"><?php echo e(get_phrase('Filters')); ?></h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="category" id="category" class="" onchange="this.form.submit()">
                                <option value=""  selected><?php echo e(get_phrase('Category')); ?></option>
                                <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php if(isset($_GET['category']) && $_GET['category']!=""): ?><?php echo e($_GET['category']==$category->id?"selected" :""); ?><?php endif; ?> ><?php echo e(ucfirst($category->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="condition" class="" onchange="this.form.submit()">
                                <option value=""  selected><?php echo e(get_phrase('Condition')); ?></option>
                                <option value="used" <?php if(isset($_GET['condition']) && $_GET['condition']!=""): ?><?php echo e($_GET['condition']=='used'?"selected" :""); ?><?php endif; ?> ><?php echo e(get_phrase('Used')); ?></option>
                                <option value="new" <?php if(isset($_GET['condition']) && $_GET['condition']!=""): ?><?php echo e($_GET['condition']=='new'?"selected" :""); ?><?php endif; ?> ><?php echo e(get_phrase('New')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" class="submit_on_enter" value="<?php if(isset($_GET['min']) && $_GET['min']!="" ): ?><?php echo e($_GET['min']); ?><?php endif; ?>" name="min" placeholder="min">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" class="submit_on_enter" value="<?php if(isset($_GET['max']) && $_GET['max']!="" ): ?><?php echo e($_GET['max']); ?><?php endif; ?>" name="max" placeholder="max">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="brand" class="" onchange="this.form.submit()">
                                <option value=""  selected><?php echo e(get_phrase('Select Brand')); ?></option>
                                <?php $__currentLoopData = \App\Models\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($brand->id); ?>" <?php if(isset($_GET['brand']) && $_GET['brand']!=""): ?><?php echo e($_GET['brand']==$brand->id?"selected" :""); ?><?php endif; ?> ><?php echo e(ucfirst($brand->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="location" class="submit_on_enter" value="<?php if(isset($_GET['location']) && $_GET['location']!="" ): ?><?php echo e($_GET['location']); ?><?php endif; ?>"  placeholder="Location">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!--  Product Form End -->
    <!-- Product Listing Start -->
    <div class="product-listing">
        <div class="row g-3" id="<?php if(str_contains(url()->current(), '/productdata')): ?> single-item-countable <?php endif; ?>">
            <?php echo $__env->make('frontend.marketplace.product-single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>





<?php $__env->startSection('specific_code_niceselect'); ?>
    $('select').niceSelect();
<?php $__env->stopSection(); ?>



<?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/marketplace/products.blade.php ENDPATH**/ ?>