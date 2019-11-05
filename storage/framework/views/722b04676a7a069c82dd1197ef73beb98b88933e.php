<form data-vv-scope="payment-form">
    <div class="form-container">
        <div class="form-header">
            <h1><?php echo e(__('shop::app.checkout.onepage.payment-information')); ?></h1>
        </div>

        <div class="payment-methods">

            <div class="control-group" :class="[errors.has('payment-form.payment[method]') ? 'has-error' : '']">

                <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <span class="radio">
                        <input v-validate="'required'" type="radio" id="<?php echo e($payment['method']); ?>" name="payment[method]" value="<?php echo e($payment['method']); ?>" v-model="payment.method" @change="methodSelected()" data-vv-as="&quot;<?php echo e(__('shop::app.checkout.onepage.payment-method')); ?>&quot;">
                        <label class="radio-view" for="<?php echo e($payment['method']); ?>"></label>
                        <?php echo e($payment['method_title']); ?>

                    </span>
                    <?php if($payment['other_details']): ?>
                        <div class="control-info">
                            <div>
                                <span class="details">Bank Name:</span>
                                <span>
                                    <strong><?php echo e($payment['other_details']['bank']); ?></strong>
                                </span>
                            </div>
                            <div>
                                <span class="details">Account Number:</span>
                                <span>
                                    <strong>
                                        <strong><?php echo e($payment['other_details']['account_no']); ?></strong>
                                    </strong>
                                </span>
                            </div>
                            <div>
                                <span class="details">Account Name:</span>
                                <span>
                                    <strong>
                                        <strong><?php echo e($payment['other_details']['account_name']); ?></strong>
                                    </strong>
                                </span>
                            </div>
                            <div style="margin-top:1em">Note: Call <?php echo e(core()->getCurrentChannel()->phone_number); ?> to confirm payment after a successful bank transfer.</div>
                        </div>
                    <?php else: ?>
                        <span class="control-info"><?php echo e($payment['description']); ?></span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <span class="control-error" v-if="errors.has('payment-form.payment[method]')">
                    {{ errors.first('payment-form.payment[method]') }}
                </span>

            </div>
        </div>
    </div>
</form>
