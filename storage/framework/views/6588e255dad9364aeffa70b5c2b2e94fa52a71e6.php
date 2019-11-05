<form data-vv-scope="shipping-form">
    <div class="form-container">
        <div class="form-header">
            <h1><?php echo e(__('shop::app.checkout.onepage.delivery-method')); ?></h1>
        </div>

        <div class="shipping-methods">
            <label for="shipping">Select Store Pickup or Delivery Location</label>
            <div class="control-group" :class="[errors.has('shipping-form.shipping_method') ? 'has-error' : '']">
                <select type="text" placeholder="Select Store Pickup or Delivery Location" v-model="selected_shipping_method" v-validate="'required'" class="control" id="shipping" name="shipping_method" @change="methodSelected()">
                    <?php $__currentLoopData = $shippingRateGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rateGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <optgroup label="Pick up your Items In-store">
                            <?php $__currentLoopData = $rateGroup['rates']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($rate->method); ?>"> <?php echo e($rate->method_title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <optgroup label="Select Delivery Location">
                        <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="location" value="<?php echo e($loc->id); ?>"><?php echo e($loc->location); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </optgroup>
                </select>
                <label for="shipping" id="shippingLabel"> <?php echo core()->getConfigData('sales.carriers.free.description'); ?></label>

                <span class="control-error" v-if="errors.has('shipping-form.shipping_method')">
                    {{ errors.first('shipping-form.shipping_method') }}
                </span>

            </div>

        </div>
    </div>
</form>
