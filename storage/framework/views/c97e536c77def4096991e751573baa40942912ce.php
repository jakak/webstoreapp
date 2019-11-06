<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.themes.title')); ?>

<?php $__env->stopSection(); ?>
<style>
    .tabs {
        display: none;
    }
    .page-img {
        display: flex;
        justify-content: center;
    }
    .page-img img {
        width: 65%;
        height: 65%;
    }
</style>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.settings.themes.title')); ?></h1>
            </div>
        </div>
        <div class="page-content">
            <div class="page-img">
                <img src="https://res.cloudinary.com/webstore-cloud/image/upload/v1567933022/Theme%20Manager/webstore-theme-manager.svg" witdth="20%" alt="">
            </div>
            <div class="table">
                <table class="table">
                    <thead>
                        <tr style="height: 50px;">
                            <th style="width:80%">
                                Current Theme
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>Default Theme</td>
                        <td><a href="<?php echo e(route('admin.themes.customize')); ?>" class="btn btn-md btn-primary">Customize</a></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>