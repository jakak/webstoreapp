<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.order.index.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <div class="account-content">
        <?php echo $__env->make('shop::customers.account.partials.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="account-layout">

            <div class="account-head mb-10">
                <span class="back-icon"><a href="<?php echo e(route('customer.account.index')); ?>"><i class="icon icon-menu-back"></i></a></span>
                <span class="account-heading">
                    <?php echo e(__('shop::app.customer.account.order.index.title')); ?>

                </span>

                <div class="horizontal-rule"></div>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.orders.list.before', ['orders' => $orders]); ?>


            <div class="account-items-list">

                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th> <?php echo e(__('shop::app.customer.account.order.index.order_id')); ?></th>
                                <th> <?php echo e(__('shop::app.customer.account.order.index.date')); ?> </th>
                                <th> <?php echo e(__('shop::app.customer.account.order.index.total')); ?> </th>
                                <th> <?php echo e(__('shop::app.customer.account.order.index.status')); ?> </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.index.order_id')); ?>">
                                        <a class="hyperlink" href="<?php echo e(route('customer.orders.view', $order->id)); ?>">
                                            #<?php echo e($order->id); ?>

                                        </a>
                                    </td>

                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.index.date')); ?>"><?php echo e(core()->formatDate($order->created_at, 'd M Y')); ?></td>

                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.index.total')); ?>">
                                        <?php echo e(core()->formatPrice($order->grand_total, $order->order_currency_code)); ?>

                                    </td>

                                    <td data-value="<?php echo e(__('shop::app.customer.account.order.index.status')); ?>">
                                        <?php if($order->status == 'processing'): ?>
                                            <span class="badge badge-md badge-success">Processing</span>
                                        <?php elseif($order->status == 'completed'): ?>
                                            <span class="badge badge-md badge-success">Completed</span>
                                        <?php elseif($order->status == "canceled"): ?>
                                            <span class="badge badge-md badge-danger">Canceled</span>
                                        <?php elseif($order->status == "closed"): ?>
                                            <span class="badge badge-md badge-info">Closed</span>
                                        <?php elseif($order->status == "pending"): ?>
                                            <span class="badge badge-md badge-warning">Pending</span>
                                        <?php elseif($order->status == "pending_payment"): ?>
                                            <span class="badge badge-md badge-warning">Pending Payment</span>
                                        <?php elseif($order->status == "fraud"): ?>
                                            <span class="badge badge-md badge-danger">Fraud</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(! $orders->count()): ?>
                                <tr>
                                    <td class="empty" colspan="4"><?php echo e(__('admin::app.common.no-result-found')); ?></td>
                                <tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if(!$orders->count()): ?>
                    <div class="responsive-empty"><?php echo e(__('admin::app.common.no-result-found')); ?></div>
                <?php endif; ?>

            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.orders.list.after', ['orders' => $orders]); ?>


        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>