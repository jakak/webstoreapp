<?php $productImageHelper = app('Webkul\Product\Helpers\ProductImage'); ?>



<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.review.index.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="account-content">
        <?php echo $__env->make('shop::customers.account.partials.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="account-layout">

            <div class="account-head">
                <span class="back-icon"><a href="<?php echo e(route('customer.account.index')); ?>"><i class="icon icon-menu-back"></i></a></span>

                <span class="account-heading"><?php echo e(__('shop::app.customer.account.review.index.title')); ?></span>

                <?php if(count($reviews) > 1): ?>
                    <div class="account-action">
                        <a href="<?php echo e(route('customer.review.deleteall')); ?>"><?php echo e(__('shop::app.wishlist.deleteall')); ?></a>
                    </div>
                <?php endif; ?>

                <span></span>
                <div class="horizontal-rule"></div>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.reviews.list.before', ['reviews' => $reviews]); ?>


            <div class="account-items-list">
                <?php if(! $reviews->isEmpty()): ?>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="account-item-card mt-15 mb-15">
                            <div class="media-info">
                                <?php $image = $productImageHelper->getProductBaseImage($review->product); ?>

                                <a href="<?php echo e(url()->to('/').'/products/'.$review->product->url_key); ?>" title="<?php echo e($review->product->name); ?>">
                                    <img class="media" src="<?php echo e($image['small_image_url']); ?>"/>
                                </a>

                                <div class="info">
                                    <div class="product-name">
                                        <a class="hyperlink" href="<?php echo e(url()->to('/').'/products/'.$review->product->url_key); ?>" title="<?php echo e($review->product->name); ?>">
                                            <?php echo e($review->product->name); ?>

                                        </a>
                                    </div>

                                    <div class="stars mt-10">
                                        <?php for($i=0 ; $i < $review->rating ; $i++): ?>
                                            <span class="icon star-icon"></span>
                                        <?php endfor; ?>
                                    </div>

                                    <div class="mt-10">
                                        <?php echo e($review->comment); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="operations">
                                <a class="mb-50" href="<?php echo e(route('customer.review.delete', $review->id)); ?>"><span class="icon trash-icon"></span></a>
                            </div>
                        </div>
                        <div class="horizontal-rule mb-10 mt-10"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="empty mt-15">
                        <?php echo e(__('customer::app.reviews.empty')); ?>

                    </div>
                <?php endif; ?>

            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.reviews.list.after', ['reviews' => $reviews]); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>