<?php $__env->startSection('content-wrapper'); ?>

<div class="account-content">
    <?php $productImageHelper = app('Webkul\Product\Helpers\ProductImage'); ?>

    <?php echo $__env->make('shop::customers.account.partials.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="account-layout">

        <div class="account-head mb-15">
            <span class="account-heading"><?php echo e(__('shop::app.wishlist.title')); ?></span>

            <?php if(count($items)): ?>
            <div class="account-action">
                <a class="hyperlink" href="<?php echo e(route('customer.wishlist.removeall')); ?>"><?php echo e(__('shop::app.wishlist.deleteall')); ?></a>
            </div>
            <?php endif; ?>
            <div class="horizontal-rule"></div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.wishlist.list.before', ['wishlist' => $items]); ?>


        <div class="account-items-list">

            <?php if($items->count()): ?>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="account-item-card mt-15 mb-15">
                    <div class="media-info">
                        <?php
                            $image = $productImageHelper->getProductBaseImage($item->product);
                        ?>
                            <img class="media" src="<?php echo e($image['small_image_url']); ?>" />
                        
                        <div class="info">
                            <div class="product-name">
                                <?php echo e($item->product->name); ?>

                                
                            </div>
                            <?php $reviewHelper = app('Webkul\Product\Helpers\Review'); ?>
                            <span class="stars" style="display: inline">
                                <?php for($i=1;$i<=$reviewHelper->getAverageRating($item->product);$i++): ?>
                                    <span class="icon star-icon"></span>
                                <?php endfor; ?>
                            </span>
                        </div>
                    </div>

                    <div class="operations">
                        <a class="mb-50" href="<?php echo e(route('customer.wishlist.remove', $item->id)); ?>"><span class="icon trash-icon"></span></a>

                        <a href="<?php echo e(route('customer.wishlist.move', $item->id)); ?>" class="btn btn-primary btn-md"><?php echo e(__('shop::app.wishlist.move-to-cart')); ?></a>
                    </div>
                </div>
                <div class="horizontal-rule mb-10 mt-10"></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="empty">
                    <?php echo e(__('customer::app.wishlist.empty')); ?>

                </div>
            <?php endif; ?>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.wishlist.list.after', ['wishlist' => $items]); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>