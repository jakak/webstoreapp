<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.themes.homepage-layout')); ?>

<?php $__env->stopSection(); ?>
<style>
    span.copy {
        cursor: pointer;
        position: relative;
        display: inline-block;
    }
    .copy-tip {
        display: none;
        background-color: #79c142;
        color: #FFFFFF;
        width: 170px;
        text-align: center;
        box-shadow: 0 0 10px #000;
        position: absolute;
        top: 10px;
        right: 10px;
        border-radius: 5px;
    }
</style>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.settings.themes.homepage-layout')); ?></h1>
            </div>
        </div>
        <div class="page-content">
            <form action="<?php echo e(route('admin.themes.store')); ?>" enctype="multipart/form-data" method="POST">
                <div class="form-container">
                    <?php echo csrf_field(); ?>
                    <accordian :title="'General Layout'" :active="true">
                        <div slot="body">
                            <h4><label for="home_page_content"><?php echo e(__('admin::app.settings.channels.sections-shortcodes')); ?></label></h4>

                            <ul style="list-style: disc !important; margin-left: 19px; white-space: pre;">
                                <span class="copy-tip">Copied to Clipboard</span>
                                <li>Slider — <i id="copy_slider"><?php echo '@'.'include("shop::home.slider")'; ?> </i><span data-clipboard-target="#copy_slider" id="slider" class="fas fa-copy copy" style="color: #79c142;"></span></li>

                                <li>Featured Products — <i id="copy_featured"><?php echo '@'.'include("shop::home.featured-products")' ?></i> <span data-clipboard-target="#copy_featured" id="featured-products" class="fas fa-copy copy" style="color: #79c142;"></span></li>

                                <li>New Products — <i id="copy_new"><?php echo '@'.'include("shop::home.new-products")' ?></i> <span data-clipboard-target="#copy_new" id="new-products" class="fas fa-copy copy" style="color: #79c142;"></span></li>
                            </ul>
                            &nbsp;
                            <div class="control-group">
                                <label for="home_page_content"><?php echo e(__('admin::app.settings.channels.home_page_content')); ?></label>
                                <textarea class="control" id="home_page_content" name="home_page_content"><?php echo e(old('home_page_content') ?: $channel->home_page_content); ?></textarea>
                            </div>
                        </div>
                    </accordian>

                    <accordian :title="'Product Rows'" :active="false">
                        <div slot="body">
                            <div class="control-group">
                                <label for="row-featured">Number of Row(s) for Featured Products</label>
                                <select name="new_featured_row" id="row-featured" class="control">
                                    <?php $__currentLoopData = [1 => '1 Row', 2 => '2 Rows',3 => '3 Rows', 4 => '4 Rows', 5 => '5 Rows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e($channel->new_featured_row === $key? 'selected': ''); ?>><?php echo e($row); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="control-group">
                                <label for="row-new">Number of Row(s) for New Products</label>
                                <select name="new_product_row" id="row-new" class="control">
                                    <?php $__currentLoopData = [1 => '1 Row', 2 => '2 Rows',3 => '3 Rows', 4 => '4 Rows', 5 => '5 Rows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e($channel->new_product_row === $key? 'selected': ''); ?>><?php echo e($row); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </accordian>
                </div>
                <hr class="horizontal-line">
                <div class="form-bottom">
                    <button onclick="document.querySelector('#submit').click()" class="btn btn-md btn-primary">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js')); ?>"></script>

    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea#home_page_content,textarea#footer_content',
                height: 200,
                width: "70%",
                plugins: 'image imagetools media wordcount save fullscreen code link',
                toolbar1: 'formatselect | bold italic underline  link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent ',
                image_advtab: true,
                valid_elements : '*[*]'
            });
        });
    </script>

    <script src="<?php echo e(asset('vendor/webkul/admin/assets/js/clipboard.js')); ?>"></script>
    <script>

        let new_product = new ClipboardJS('#new-products');
        let featured_products = new ClipboardJS('#featured-products');
        let slider = new ClipboardJS('#slider');

        slider.on('success', function (e) {
            $('.copy-tip').fadeIn(10);
            setTimeout(() => {
                $('.copy-tip').fadeOut(500);
            }, 500);
        });

        featured_products.on('success', function (e) {
            $('.copy-tip').fadeIn(10);
            setTimeout(() => {
                $('.copy-tip').fadeOut(500);
            }, 500);
        });

        new_product.on('success', function (e) {
            $('.copy-tip').fadeIn(10);
            setTimeout(() => {
                $('.copy-tip').fadeOut(500);
            }, 500);
        });


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>