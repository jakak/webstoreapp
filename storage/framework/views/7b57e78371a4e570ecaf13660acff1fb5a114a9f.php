<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.address.create.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <div class="account-content">

        <?php echo $__env->make('shop::customers.account.partials.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="account-layout">
            <div class="account-head mb-15">
                <span class="back-icon"><a href="<?php echo e(route('customer.account.index')); ?>"><i class="icon icon-menu-back"></i></a></span>
                <span class="account-heading"><?php echo e(__('shop::app.customer.account.address.create.title')); ?></span>
                <span></span>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.account.address.create.before'); ?>


            <form method="post" action="<?php echo e(route('customer.address.create')); ?>" @submit.prevent="onSubmit">

                <div class="account-table-content">
                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.shop.customers.account.address.create_form_controls.before'); ?>


                    <div class="control-group" :class="[errors.has('address1') ? 'has-error' : '']">
                        <label for="address1" class="required"><?php echo e(__('shop::app.customer.account.address.create.address1')); ?></label>
                        <input type="text" class="control" name="address1" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.address1')); ?>&quot;">
                        <span class="control-error" v-if="errors.has('address1')">{{ errors.first('address1') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('address2') ? 'has-error' : '']">
                        <label for="address2"><?php echo e(__('shop::app.customer.account.address.create.address2')); ?></label>
                        <input type="text" class="control" name="address2">
                        <span class="control-error" v-if="errors.has('address2')">{{ errors.first('address2') }}</span>
                    </div>

                    <?php echo $__env->make('shop::customers.account.address.country-state', ['countryCode' => old('country'), 'stateCode' => old('state')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="control-group" :class="[errors.has('city') ? 'has-error' : '']">
                        <label for="city" class="required"><?php echo e(__('shop::app.customer.account.address.create.city')); ?></label>
                        <input type="text" class="control" name="city" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.city')); ?>&quot;">
                        <span class="control-error" v-if="errors.has('city')">{{ errors.first('city') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('postcode') ? 'has-error' : '']">
                        <label for="postcode" class="required"><?php echo e(__('shop::app.customer.account.address.create.postcode')); ?></label>
                        <input type="text" class="control" name="postcode" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.postcode')); ?>&quot;">
                        <span class="control-error" v-if="errors.has('postcode')">{{ errors.first('postcode') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('phone') ? 'has-error' : '']">
                        <label for="phone" class="required"><?php echo e(__('shop::app.customer.account.address.create.phone')); ?></label>
                        <input type="text" class="control" name="phone" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('shop::app.customer.account.address.create.phone')); ?>&quot;">
                        <span class="control-error" v-if="errors.has('phone')">{{ errors.first('phone') }}</span>
                    </div>

                    <?php echo view_render_event('bagisto.shop.customers.account.address.create_form_controls.after'); ?>


                    <div class="button-group">
                        <input class="btn btn-primary btn-md" type="submit" value="<?php echo e(__('shop::app.customer.account.address.create.submit')); ?>">
                        
                    </div>

                </div>

            </form>

            <?php echo view_render_event('bagisto.shop.customers.account.address.create.after'); ?>


        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>