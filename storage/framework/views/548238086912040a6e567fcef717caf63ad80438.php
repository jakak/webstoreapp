<?php $__env->startComponent('shop::emails.layouts.master'); ?>
    <div style="text-align: center;">
        <a href="<?php echo e(config('app.url')); ?>">
            <img src="<?php echo e(bagisto_asset('images/logo.png')); ?>" style="width: 260px">
        </a>
    </div>

    <div style="padding: 30px;">
        <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.forget-password.dear', ['name' => $user_name])); ?>,
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.forget-password.info')); ?>

            </p>

            <p style="text-align: center;padding: 20px 0;">
                <a href="<?php echo e(route('customer.reset-password.create', $token)); ?>" style="padding: 10px 20px;background: #0041FF;color: #ffffff;text-transform: uppercase;text-decoration: none; font-size: 16px">
                    <?php echo e(__('shop::app.mail.forget-password.reset-password')); ?>

                </a>
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.forget-password.final-summary')); ?>

            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.forget-password.thanks')); ?>

            </p>

        </div>
    </div>
<?php echo $__env->renderComponent(); ?>