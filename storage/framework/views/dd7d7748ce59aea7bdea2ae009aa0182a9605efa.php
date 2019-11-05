<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.address.index.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

<div class="account-content">

    <?php echo $__env->make('shop::customers.account.partials.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="account-layout">

        <div class="account-head">
            <span class="back-icon"><a href="<?php echo e(route('customer.account.index')); ?>"><i class="icon icon-menu-back"></i></a></span>
            <span class="account-heading"><?php echo e(__('shop::app.customer.account.address.index.title')); ?></span>

            <?php if(! $addresses->isEmpty()): ?>
                <span class="account-action">
                    <a class="hyperlink" href="<?php echo e(route('customer.address.create')); ?>"><?php echo e(__('shop::app.customer.account.address.index.add')); ?></a>
                </span>
            <?php else: ?>
                <span></span>
            <?php endif; ?>
            <div class="horizontal-rule"></div>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.address.list.before', ['addresses' => $addresses]); ?>


        <div class="account-table-content">
            <?php if($addresses->isEmpty()): ?>
                <div><?php echo e(__('shop::app.customer.account.address.index.empty')); ?></div>
                <br/>
                <a class="hyperlink" href="<?php echo e(route('customer.address.create')); ?>"><?php echo e(__('shop::app.customer.account.address.index.add')); ?></a>
            <?php else: ?>
                <div class="address-holder">
                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="address-card-1">
                            <div class="details <?php if($address->default_address): ?> mt-20 <?php endif; ?>">
                                <span class="bold"><?php echo e(auth()->guard('customer')->user()->name); ?></span>
                                <?php echo e($address->name); ?></br>
                                <?php echo e($address->address1); ?>, <?php echo e($address->address2 ? $address->address2 . ',' : ''); ?></br>
                                <?php echo e($address->city); ?></br>
                                <?php echo e($address->state); ?></br>
                                <?php echo e(country()->name($address->country)); ?> <?php echo e($address->postcode); ?></br></br>
                                <?php echo e(__('shop::app.customer.account.address.index.contact')); ?> : <?php echo e($address->phone); ?>


                                <div class="control-links mt-20">
                                    <span>
                                        <a class="hyperlink" href="<?php echo e(route('customer.address.edit', $address->id)); ?>">
                                            <?php echo e(__('shop::app.customer.account.address.index.edit')); ?>

                                        </a>
                                    </span>

                                    <span>
                                        <a  class="hyperlink" href="<?php echo e(route('address.delete', $address->id)); ?>" onclick="deleteAddress('<?php echo e(__('shop::app.customer.account.address.index.confirm-delete')); ?>')">
                                            <?php echo e(__('shop::app.customer.account.address.index.delete')); ?>

                                        </a>
                                    </span>
                                </div>

                                <?php if($address->default_address): ?>
                                    <span class="default-address badge badge-md badge-success"><?php echo e(__('shop::app.customer.account.address.index.default')); ?></span>
                                <?php else: ?>
                                    <div class="make-default mt-20">
                                        <a  href="<?php echo e(route('make.default.address', $address->id)); ?>" class="btn btn-md btn-primary"><?php echo e(__('shop::app.customer.account.address.index.make-default')); ?></a>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.account.address.list.after', ['addresses' => $addresses]); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function deleteAddress(message) {
            if (!confirm(message))
            event.preventDefault();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>