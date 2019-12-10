<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.themes.footer')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.settings.themes.footer')); ?></h1>
            </div>

        </div>
        <div class="page-content">
            <form action="<?php echo e(route('admin.configuration.footer.pages.create')); ?>" enctype="multipart/form-data" method="POST">
                <div class="form-container">
                    <?php echo csrf_field(); ?>
                    <accordian :title="'Page Links'" :active="true">
                            <?php echo $__env->make('shop::layouts.footer.page_link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </accordian>

                    <accordian :title="'Social Links'" :active="false">
                            <?php echo $__env->make('shop::layouts.footer.social_link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </accordian>

                    <accordian :title="'Footer Credit'" :active="false">
                            <?php echo $__env->make('shop::layouts.footer.footer_credit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </accordian>
                </div>

                <hr class="horizontal-line">
                <div class="form-bottom">
                    <button type="submit" class="btn btn-md btn-primary">
                        save
                    </button>
                </div>

            </form>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>