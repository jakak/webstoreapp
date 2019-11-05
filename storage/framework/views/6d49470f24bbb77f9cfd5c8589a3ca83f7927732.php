<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Cache-control" content="no-cache">

        <style type="text/css">
            body, th, td, h5 {
                font-size: 12px;
                color: #000;
            }

            .container {
                padding: 20px;
                display: block;
            }

            .invoice-summary {
                margin-bottom: 20px;
            }

            .table {
                margin-top: 20px;
            }

            .table table {
                width: 100%;
                border-collapse: collapse;
                text-align: left;
            }

            .table thead th {
                font-weight: 700;
                border-top: solid 1px #d3d3d3;
                border-bottom: solid 1px #d3d3d3;
                border-left: solid 1px #d3d3d3;
                padding: 5px 10px;
                background: #F4F4F4;
            }

            .table thead th:last-child {
                border-right: solid 1px #d3d3d3;
            }

            .table tbody td {
                padding: 5px 10px;
                border-bottom: solid 1px #d3d3d3;
                border-left: solid 1px #d3d3d3;
                color: $font-color;
                vertical-align: middle;
            }

            .table tbody td p {
                margin: 0;
            }

            .table tbody td:last-child {
                border-right: solid 1px #d3d3d3;
            }

           .sale-summary {
                margin-top: 40px;
                float: right;
            }

            .sale-summary tr td {
                padding: 3px 5px;
            }

            .sale-summary tr.bold {
                font-weight: 600;
            }

            .label {
                color: #000;
                font-weight: 600;
            }
            
        </style>
    </head>

    <body style="background-image: none;background-color: #fff;">
        <div class="container">

            <div class="invoice-summary">

                <div class="row">
                    <span class="label"><?php echo e(__('shop::app.customer.account.order.view.invoice-id')); ?> -</span>
                    <span class="value">#<?php echo e($invoice->id); ?></span>
                </div>

                <div class="row">
                    <span class="label"><?php echo e(__('shop::app.customer.account.order.view.order-id')); ?> -</span>
                    <span class="value">#<?php echo e($invoice->order_id); ?></span>
                </div>

                <div class="row">
                    <span class="label"><?php echo e(__('shop::app.customer.account.order.view.order-date')); ?> -</span>
                    <span class="value"><?php echo e(core()->formatDate($invoice->order->created_at, 'M d, Y')); ?></span>
                </div>

                <div class="table address">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 50%"><?php echo e(__('shop::app.customer.account.order.view.bill-to')); ?></th>
                                <th><?php echo e(__('shop::app.customer.account.order.view.ship-to')); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <p><?php echo e($invoice->order->billing_address->name); ?></p>
                                    <p><?php echo e($invoice->order->billing_address->address1); ?>, <?php echo e($invoice->order->billing_address->address2 ? $invoice->order->billing_address->address2 . ',' : ''); ?></p>
                                    <p><?php echo e($invoice->order->billing_address->city); ?></p>
                                    <p><?php echo e($invoice->order->billing_address->state); ?></p>
                                    <p><?php echo e(country()->name($invoice->order->billing_address->country)); ?> <?php echo e($invoice->order->billing_address->postcode); ?></p>
                                    <?php echo e(__('shop::app.customer.account.order.view.contact')); ?> : <?php echo e($invoice->order->billing_address->phone); ?> 
                                </td>
                                <td>
                                    <p><?php echo e($invoice->order->shipping_address->name); ?></p>
                                    <p><?php echo e($invoice->order->shipping_address->address1); ?>, <?php echo e($invoice->order->shipping_address->address2 ? $invoice->order->shipping_address->address2 . ',' : ''); ?></p>
                                    <p><?php echo e($invoice->order->shipping_address->city); ?></p>
                                    <p><?php echo e($invoice->order->shipping_address->state); ?></p>
                                    <p><?php echo e(country()->name($invoice->order->shipping_address->country)); ?> <?php echo e($invoice->order->shipping_address->postcode); ?></p>
                                    <?php echo e(__('shop::app.customer.account.order.view.contact')); ?> : <?php echo e($invoice->order->shipping_address->phone); ?> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table payment-shipment">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 50%"><?php echo e(__('shop::app.customer.account.order.view.payment-method')); ?></th>
                                <th><?php echo e(__('shop::app.customer.account.order.view.shipping-method')); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <?php echo e(core()->getConfigData('payment.paymentmethods.' . $invoice->order->payment->method . '.title')); ?>

                                </td>
                                <td>
                                    <?php echo e($invoice->order->shipping_title); ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="table items">
                    <table>
                        <thead>
                            <tr>
                                <th><?php echo e(__('shop::app.customer.account.order.view.SKU')); ?></th>
                                <th><?php echo e(__('shop::app.customer.account.order.view.product-name')); ?></th>
                                <th><?php echo e(__('shop::app.customer.account.order.view.price')); ?></th>
                                <th><?php echo e(__('shop::app.customer.account.order.view.qty')); ?></th>
                                <th><?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?></th>
                                <th><?php echo e(__('shop::app.customer.account.order.view.tax-amount')); ?></th>
                                <th><?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->child ? $item->child->sku : $item->sku); ?></td>
                                    <td>
                                        <?php echo e($item->name); ?>


                                        <?php if($html = $item->getOptionDetailHtml()): ?>
                                            <p><?php echo e($html); ?></p>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(core()->formatBasePrice($item->base_price)); ?></td>
                                    <td><?php echo e($item->qty); ?></td>
                                    <td><?php echo e(core()->formatBasePrice($item->base_total)); ?></td>
                                    <td><?php echo e(core()->formatBasePrice($item->base_tax_amount)); ?></td>
                                    <td><?php echo e(core()->formatBasePrice($item->base_total + $item->base_tax_amount)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>


                <table class="sale-summary">
                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.order.view.subtotal')); ?></td>
                        <td>-</td>
                        <td><?php echo e(core()->formatPrice($invoice->base_sub_total, $invoice->order->order_currency_code)); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.order.view.shipping-handling')); ?></td>
                        <td>-</td>
                        <td><?php echo e(core()->formatPrice($invoice->base_shipping_amount, $invoice->order->order_currency_code)); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.order.view.tax')); ?></td>
                        <td>-</td>
                        <td><?php echo e(core()->formatPrice($invoice->base_tax_amount, $invoice->order->order_currency_code)); ?></td>
                    </tr>

                    <tr class="bold">
                        <td><?php echo e(__('shop::app.customer.account.order.view.grand-total')); ?></td>
                        <td>-</td>
                        <td><?php echo e(core()->formatPrice($invoice->base_grand_total, $invoice->order->order_currency_code)); ?></td>
                    </tr>
                </table>

            </div>

        </div>
    </body>
</html>
    