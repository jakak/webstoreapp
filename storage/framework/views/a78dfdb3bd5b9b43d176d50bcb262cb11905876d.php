<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.reviews.add-review-page-title')); ?> - <?php echo e($product->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <section class="review">

        <div class="review-layouter mb-20">
            <div class="product-info">
                <?php $productImageHelper = app('Webkul\Product\Helpers\ProductImage'); ?>

                <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>

                <div class="product-image">
                    <a href="<?php echo e(route('shop.products.index', $product->url_key)); ?>" title="<?php echo e($product->name); ?>">
                        <img src="<?php echo e($productBaseImage['medium_image_url']); ?>" />
                    </a>
                </div>

                <div class="product-name mt-20">
                    <a href="<?php echo e(url()->to('/').'/products/'.$product->url_key); ?>" title="<?php echo e($product->name); ?>">
                        <span><?php echo e($product->name); ?></span>
                    </a>
                </div>

                <div class="product-price mt-10">
                    <?php $priceHelper = app('Webkul\Product\Helpers\Price'); ?>

                    <?php if($product->type == 'configurable'): ?>
                        <span class="pro-price"><?php echo e(core()->currency($priceHelper->getMinimalPrice($product))); ?></span>
                    <?php else: ?>
                        <?php if($priceHelper->haveSpecialPrice($product)): ?>
                            <span class="pro-price"><?php echo e(core()->currency($priceHelper->getSpecialPrice($product))); ?></span>
                        <?php else: ?>
                            <span class="pro-price"><?php echo e(core()->currency($product->price)); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="review-form">
                <form method="POST" action="<?php echo e(route('shop.reviews.store', $product->id )); ?>" @submit.prevent="onSubmit">
                    <?php echo csrf_field(); ?>

                    <div class="heading mt-10 mb-25">
                        <span><?php echo e(__('shop::app.reviews.write-review')); ?></span>
                    </div>

                    <div class="control-group" :class="[errors.has('rating') ? 'has-error' : '']">
                        <label for="title" class="required">
                            <?php echo e(__('admin::app.customers.reviews.rating')); ?>

                        </label>

                        <div class="stars">
                            <span class="star star-5" for="star-5" onclick="calculateRating(id)" id="1"></span>
                            <span class="star star-4" for="star-4" onclick="calculateRating(id)" id="2"></span>
                            <span class="star star-3" for="star-3" onclick="calculateRating(id)" id="3"></span>
                            <span class="star star-2" for="star-2" onclick="calculateRating(id)" id="4"></span>
                            <span class="star star-1" for="star-1" onclick="calculateRating(id)" id="5"></span>
                        </div>

                        <input type="hidden" id="rating" name="rating" v-validate="'required'">

                        <div class="control-error" v-if="errors.has('rating')">{{ errors.first('rating') }}</div>
                    </div>

                    <div class="control-group" :class="[errors.has('title') ? 'has-error' : '']">
                        <label for="title" class="required">
                            <?php echo e(__('shop::app.reviews.title')); ?>

                        </label>
                        <input  type="text" class="control" name="title" v-validate="'required'" value="<?php echo e(old('title')); ?>">
                        <span class="control-error" v-if="errors.has('title')">{{ errors.first('title') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('comment') ? 'has-error' : '']">
                        <label for="comment" class="required">
                            <?php echo e(__('admin::app.customers.reviews.comment')); ?>

                        </label>
                        <textarea type="text" class="control" name="comment" v-validate="'required'" value="<?php echo e(old('comment')); ?>">
                        </textarea>
                        <span class="control-error" v-if="errors.has('comment')">{{ errors.first('comment') }}</span>
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">
                        <?php echo e(__('shop::app.reviews.submit')); ?>

                    </button>

                </form>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

    <script>

        function calculateRating(id) {
            var a = document.getElementById(id);
            document.getElementById("rating").value = id;

            for (let i=1 ; i <= 5 ; i++) {
                if (id >= i) {
                    document.getElementById(i).style.color="#242424";
                } else {
                    document.getElementById(i).style.color="#d4d4d4";
                }
            }
        }

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>