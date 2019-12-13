<div class="footer">
    <div class="footer-content">
        <div class="footer-list-container">

            <div class="list-container">
                <span class="list-heading"><?php echo e(__('shop::app.footer.featured-posts')); ?></span>
                <div class="form-container">
                    <div class="control-group">
                        <ul class="text-color list-group">
                            <?php $__currentLoopData = App\FooterPage::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page->name != "none"): ?>
                                    <li><a href="<?php echo e($page->url); ?>"><?php echo e($page->name); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="list-container">
                <span class="list-heading"><?php echo e(__('shop::app.footer.store-info')); ?></span>
                <div class="form-container">
                    <div class="control-group">
                        <ul class="list-group">
                            <li><a href="/about">About</a></li>
                            <li><a href="/refund-policy">Refund policy</a></li>
                            <li><a href="/return-policy">Return policy</a></li>
                            <li><a href="/privacy-policy">Privacy policy</a></li>
                            <li><a href="/terms-of-use">Terms of use</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="list-container">
                <span class="list-heading"><?php echo e(__('shop::app.footer.secure-shopping')); ?></span>
                <div class="form-container">
                    <div class="control-group">
                        <img src="https://res.cloudinary.com/webstore-cloud/image/upload/c_scale,w_250/v1567929421/Paystack/paystack-badge-cards_nji4dn.png" />
                    </div>
                </div>

                <span class="list-heading"><?php echo e(__('shop::app.footer.social')); ?></span>
                <div class="form-container">
                    <div class="control-group">
                        <?php $__currentLoopData = App\SocialIcon::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($social->url); ?>"><?php echo $social->icon; ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>

            <div class="list-container">
                <span class="list-heading"><?php echo e(__('shop::app.footer.customer-care')); ?></span>
                <div class="form-container">
                    <div class="control-group">
                        <a href="/contact-store"><button class="btn btn-md btn-primary"><span><i class="fas fa-headset"></i></span> Contact Store</button></a>
                    </div>
                </div>

                <span class="list-heading"><?php echo e(__('shop::app.footer.subscribe-newsletter')); ?></span>
                <div class="form-container">
                    <form action="<?php echo e(route('shop.subscribe')); ?>">
                        <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                            <input type="email" class="control subscribe-field" name="email" placeholder="Email Address" required><br/>

                            <button class="btn btn-md btn-primary"><?php echo e(__('shop::app.subscription.subscribe')); ?></button>
                        </div>
                    </form>
                </div>

                <div class="currency">
                    <span class="list-heading"><?php echo e(__('shop::app.footer.currency')); ?></span>
                    <div class="form-container">
                        <div class="control-group">
                            <select class="control locale-switcher" onchange="window.location.href = this.value">

                                <?php $__currentLoopData = core()->getCurrentChannel()->currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="?currency=<?php echo e($currency->code); ?>" <?php echo e($currency->code == core()->getCurrentCurrencyCode() ? 'selected' : ''); ?>><?php echo e($currency->code); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
