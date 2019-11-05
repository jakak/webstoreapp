<?php $productImageHelper = app('Webkul\Product\Helpers\ProductImage'); ?>

<?php $cart = cart()->getCart(); ?>

<?php if($cart): ?>
    <?php
        Cart::collectTotals();
    ?>

    <?php $items = $cart->items; ?>

    <div class="dropdown-toggle">
        <a class="cart-link" href="<?php echo e(route('shop.checkout.cart.index')); ?>">
            <span class="icon cart-icon"></span>
        </a>

        <span class="name">
            <?php echo e(__('shop::app.header.cart')); ?>

            <span class="count"> (<?php echo e($cart->items->count()); ?>)</span>
        </span>

        <i class="icon arrow-down-icon"></i>
    </div>

    <div class="dropdown-list" style="display: none; top: 50px; right: 0px">
        <div class="dropdown-container">
            <div class="dropdown-cart">
                <div class="dropdown-header">
                    <p class="heading">
                        <?php echo e(__('shop::app.checkout.cart.cart-subtotal')); ?> -

                        <?php echo view_render_event('bagisto.shop.checkout.cart-mini.subtotal.before', ['cart' => $cart]); ?>


                        <?php echo e(core()->currency($cart->base_sub_total)); ?>


                        <?php echo view_render_event('bagisto.shop.checkout.cart-mini.subtotal.after', ['cart' => $cart]); ?>

                    </p>
                </div>

                <div class="dropdown-content">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="item">
                            <div class="item-image" >
                                <?php
                                    if ($item->type == "configurable")
                                        $images = $productImageHelper->getProductBaseImage($item->child->product);
                                    else
                                        $images = $productImageHelper->getProductBaseImage($item->product);
                                ?>
                                <img src="<?php echo e($images['small_image_url']); ?>" />
                            </div>

                            <div class="item-details">
                                <?php echo view_render_event('bagisto.shop.checkout.cart-mini.item.name.before', ['item' => $item]); ?>


                                <div class="item-name"><?php echo e($item->name); ?></div>

                                <?php echo view_render_event('bagisto.shop.checkout.cart-mini.item.name.after', ['item' => $item]); ?>



                                <?php echo view_render_event('bagisto.shop.checkout.cart-mini.item.options.before', ['item' => $item]); ?>


                                <?php if($item->type == "configurable"): ?>
                                    <div class="item-options">
                                        <?php echo e(trim(Cart::getProductAttributeOptionDetails($item->child->product)['html'])); ?>

                                    </div>
                                <?php endif; ?>

                                <?php echo view_render_event('bagisto.shop.checkout.cart-mini.item.options.after', ['item' => $item]); ?>



                                <?php echo view_render_event('bagisto.shop.checkout.cart-mini.item.price.before', ['item' => $item]); ?>


                                <div class="item-price"><?php echo e(core()->currency($item->base_total)); ?></div>

                                <?php echo view_render_event('bagisto.shop.checkout.cart-mini.item.price.after', ['item' => $item]); ?>



                                <?php echo view_render_event('bagisto.shop.checkout.cart-mini.item.quantity.before', ['item' => $item]); ?>


                                <div class="item-qty">Quantity - <?php echo e($item->quantity); ?></div>

                                <?php echo view_render_event('bagisto.shop.checkout.cart-mini.item.quantity.after', ['item' => $item]); ?>

                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="dropdown-footer">
                    <a class="hyperlink" href="<?php echo e(route('shop.checkout.cart.index')); ?>"><?php echo e(__('shop::app.minicart.view-cart')); ?></a>

                    <a class="btn btn-primary btn-md" style="color: white;" href="<?php echo e(route('shop.checkout.onepage.index')); ?>"><?php echo e(__('shop::app.minicart.checkout')); ?></a>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="dropdown-toggle">
        <div style="display: inline-block; cursor: pointer;">
            <span class="icon cart-icon"></span>
            <span class="name"><?php echo e(__('shop::app.minicart.cart')); ?><span class="count"> (<?php echo e(__('shop::app.minicart.zero')); ?>) </span></span>
        </div>
    </div>
<?php endif; ?>
