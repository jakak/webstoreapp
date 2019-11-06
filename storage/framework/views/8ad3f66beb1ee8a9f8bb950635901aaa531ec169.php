<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.themes.appearance')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.settings.themes.appearance')); ?></h1>
            </div>
        </div>
        <div class="page-content">
            <form id="my_form" action="<?php echo e(route('admin.themes.store')); ?>" enctype="multipart/form-data" method="POST">
                <div class="form-container">
                    <?php echo csrf_field(); ?>
                    <accordian :title="'Storefront Logo & Favicon'" :active="true">
                        <div slot="body">
                            <div class="control-group">
                                <label><?php echo e(__('admin::app.settings.channels.storefront_logo')); ?>


                                    <image-wrapper :button-label="'<?php echo e(__('admin::app.catalog.products.add-image-btn-title')); ?>'" input-name="logo" :multiple="false" :images='"<?php echo e($channel->logo_url() ? 'storage/' . $channel->logo : '../themes/default/assets/images/logo.svg'); ?>"'  size="min-small" ></image-wrapper>
                            </div>

                            <div class="control-group">
                                <label><?php echo e(__('admin::app.settings.channels.favicon')); ?>


                                    <image-wrapper :button-label="'<?php echo e(__('admin::app.catalog.products.add-image-btn-title')); ?>'" input-name="favicon" :multiple="false" :images='"<?php echo e($channel->favicon_url() ? 'storage/' . $channel->favicon : '../themes/default/assets/images/favicon.ico'); ?>"' ></image-wrapper>
                            </div>
                        </div>
                    </accordian>

                    <accordian :title="'Customize Colors'" :active="false">
                        <div slot="body">

                            <div class="wrap-control">
                                <div class="control-group">
                                    <label for="first_name"><?php echo e(__('admin::app.settings.colors.top-menu-background')); ?></label>
                                    <?php $__currentLoopData = App\ColorPicker::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input id="myPickerId" style=""  class="jscolor control" id="first_name" name="top_menu_bg" value="<?php echo e($color->top_menu_bg); ?>"/>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="control-group last-name">
                                    <label for="last_name" ><?php echo e(__('admin::app.settings.colors.to-menu-text')); ?></label>
                                    <?php $__currentLoopData = App\ColorPicker::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input  class="control jscolor" id="last_name" name="top_menu_text" value="<?php echo e($color->top_menu_text); ?>" />
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="wrap-control">
                                <div class="control-group">
                                    <label for="first_name"><?php echo e(__('admin::app.settings.colors.top-menu-hover')); ?></label>
                                    <?php $__currentLoopData = App\ColorPicker::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input  class="jscolor control" id="first_name" name="top_menu_hover" value="<?php echo e($color->top_menu_hover); ?>"/>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="control-group last-name">
                                    <label for="last_name" ><?php echo e(__('admin::app.settings.colors.hyperlinks')); ?></label>
                                    <?php $__currentLoopData = App\ColorPicker::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input  class="control jscolor" style="color: #fff;" id="last_name" name="hyperlinks" value="<?php echo e($color->hyperlinks); ?>" />
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="wrap-control">
                                <div class="control-group">
                                    <label for="first_name"><?php echo e(__('admin::app.settings.colors.add-to-cart-button-background')); ?></label>
                                    <?php $__currentLoopData = App\ColorPicker::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input  class="control jscolor" id="first_name" name="cart_button_bg" value="<?php echo e($color->cart_button_bg); ?>"/>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="control-group last-name">
                                    <label for="last_name" ><?php echo e(__('admin::app.settings.colors.add-to-cart-button-text')); ?></label>
                                    <?php $__currentLoopData = App\ColorPicker::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input class="control jscolor" id="last_name" name="cart_button_text" value="<?php echo e($color->cart_button_text); ?>" />
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="wrap-control">
                                <div class="control-group">
                                    <label for="first_name"><?php echo e(__('admin::app.settings.colors.footer-background')); ?></label>
                                    <?php $__currentLoopData = App\ColorPicker::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input  class="control jscolor" id="first_name" name="footer_bg" value="<?php echo e($color->footer_bg); ?>"/>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="control-group last-name">
                                    <label for="last_name" ><?php echo e(__('admin::app.settings.colors.footer-title')); ?></label>
                                    <?php $__currentLoopData = App\ColorPicker::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input  class="control jscolor" id="last_name" name="footer_title" value="<?php echo e($color->footer_title); ?>" />
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="wrap-control">
                                <div class="control-group">
                                    <label for="first_name"><?php echo e(__('admin::app.settings.colors.footer-text')); ?></label>
                                    <?php $__currentLoopData = App\ColorPicker::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input class="control jscolor" id="first_name" name="footer_text" value="<?php echo e($color->footer_text); ?>"/>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="control-group last-name">
                                    <label for="last_name" ><?php echo e(__('admin::app.settings.colors.footer-button')); ?></label>
                                    <?php $__currentLoopData = App\ColorPicker::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input class="control jscolor" id="last_name" name="footer_button" value="<?php echo e($color->footer_button); ?>" />
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div><a href="javascript:{}" onclick="document.querySelector('#restore').click(); return false;">Restore</a> Default Colors</div>
                            <input style="display: none" id="restore" type="submit" name="restore" value="restore_id">

                        </div>
                    </accordian>
                </div>
                <input type="submit" style="display: none" id="submit">
            </form>
        </div>
        <hr class="horizontal-line">
        <div class="form-bottom">
            <button onclick="document.querySelector('#submit').click()" class="btn btn-md btn-primary">
                Save
            </button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('vendor/webkul/admin/assets/js/jscolor.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            jscolor.installByClassName("jscolor");
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>