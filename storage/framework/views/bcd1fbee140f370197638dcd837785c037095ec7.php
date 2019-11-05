<div class="navbar-top">
    <div class="navbar-top-left">
        <div class="brand-logo">
            <a href="<?php echo e(route('admin.dashboard.index')); ?>">
                <img src="<?php echo e(asset('vendor/webkul/ui/assets/images/webstore-logomark-two-toned.svg')); ?>" alt="Webstore by Haqqman"/>
            </a>
        </div>
    </div>

    <div class="navbar-top-right">
        <div class="profile">

            <div class="profile-info announcekit-widget">
                <font color="#79C142"><i class="far fa-bell"></i></font>
            </div>

            <div class="profile-info">
                <div class="dropdown-toggle">
                    <div style="display: inline-block; vertical-align: middle;">
                        <i class="icon avatar active"></i>
                    </div>
                </div>

                <div class="dropdown-list bottom-right move-left" style="right: 10px!important;">
                    <div class="dropdown-container">
                        <ul>
							<span class="name">
                            <?php echo e(auth()->guard('admin')->user()->fullName()); ?>

                        </span>

                            <span class="role">
                            <?php echo e(auth()->guard('admin')->user()->role['name']); ?>

                        </span>
                        </ul>
                        <hr style="height:1px; border:none; color:#e8e8e8; background:#e8e8e8;">
                        <ul>
                            <li>
                                <a href="<?php echo e(route('admin.account.index')); ?>"> <?php echo e(trans('admin::app.layouts.my-account')); ?></a>
                            </li>
                        </ul>
                        <hr style="height:1px; border:none; color:#e8e8e8; background:#e8e8e8;">
                        <label><font size="2px">Quick Links</font></label>
                        <ul>
                            <li>
                                <a href="https://dashboard.paystack.com" target="_blank"><?php echo e(trans('admin::app.layouts.manage-paystack')); ?></a>
                            </li>
                            <li>
                                <a href="https://help.webstore.ng" target="_blank"><?php echo e(trans('admin::app.layouts.get-support')); ?></a>
                            </li>
                        </ul>
                        <hr style="height:1px; border:none; color:#e8e8e8; background:#e8e8e8;">
                        <ul>
                            <li>
                                <a href="<?php echo e(route('admin.session.destroy')); ?>"><i class="fas fa-sign-out-alt"></i> <?php echo e(trans('admin::app.layouts.logout')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div  class="profile-info">
                <a style="color: #79C142" href="<?php echo e(route('shop.home.index')); ?>" target="_blank" title="<?php echo e(trans('admin::app.layouts.storefront')); ?>"><?php echo e(core()->getCurrentChannel()->name); ?> <i class="fas fa-external-link-alt"></i></a>
            </div>

        </div>
    </div>
</div>
