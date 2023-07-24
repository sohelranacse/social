<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-6 col-sm-6 col-md-4 col-lg-6 col-xl-4  <?php if(str_contains(url()->current(), '/products')): ?> single-item-countable <?php endif; ?>">
        <div class="card product p-3">
            <a href="<?php echo e(route('single.product',$product->id)); ?>" class="thumbnail-196-196" style="background-image: url('<?php echo e(get_product_image($product->image,"thumbnail")); ?>');"></a>
            <h3 class="h6"><a href="<?php echo e(route('single.product',$product->id)); ?>"><?php echo e(ellipsis($product->title, 10)); ?></a></h3>
                <span class="location"><?php echo e($product->location); ?></span>
                <a href="<?php echo e(route('single.product',$product->id)); ?>" class="btn btn-primary d-block mt-3"><?php echo e($product->getCurrency->symbol); ?><?php echo e($product->price); ?></a>
        </div>
    </div>
    <?php if(isset($search)&&!empty($search)): ?>
            <?php if($key==2): ?>
                <?php break; ?>
            <?php endif; ?>
        <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\social\resources\views/frontend/marketplace/product-single.blade.php ENDPATH**/ ?>