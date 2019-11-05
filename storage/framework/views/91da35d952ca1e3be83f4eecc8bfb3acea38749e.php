<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.profile.index.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

<div class="account-content">

    <?php echo $__env->make('shop::customers.account.partials.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="account-layout">

        <div class="account-head">

            <span class="back-icon"><a href="<?php echo e(route('customer.account.index')); ?>"><i class="icon icon-menu-back"></i></a></span>

            <span class="account-heading"><?php echo e(__('shop::app.customer.account.profile.index.title')); ?></span>

            <span class="account-action">
                <a class="hyperlink" href="<?php echo e(route('customer.profile.edit')); ?>"><?php echo e(__('shop::app.customer.account.profile.index.edit')); ?></a>
            </span>

            <div class="horizontal-rule"></div>
        </div>

         <?php echo view_render_event('bagisto.shop.customers.account.profile.view.before', ['customer' => $customer]); ?>


        <div class="account-table-content">
            <table>
                <tbody>
                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.profile.fname')); ?></td>
                        <td><?php echo e($customer->first_name); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.profile.lname')); ?></td>
                        <td><?php echo e($customer->last_name); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.profile.gender')); ?></td>
                        <td><?php echo e($customer->gender); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.profile.dob')); ?></td>
                        <td><?php echo e($customer->date_of_birth); ?></td>
                    </tr>

                    <tr>
                        <td><?php echo e(__('shop::app.customer.account.profile.email')); ?></td>
                        <td><?php echo e($customer->email); ?></td>
                    </tr>

                    

                </tbody>
            </table>
        </div>

         <?php echo view_render_event('bagisto.shop.customers.account.profile.view.after', ['customer' => $customer]); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>