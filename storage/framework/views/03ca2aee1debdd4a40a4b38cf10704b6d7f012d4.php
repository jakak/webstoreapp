<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.domains.connect-domain')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        .tabs {
            display: none;
        }
        .sub-title {
            color: #8b8b8b;
        }
        #datagrid-filters {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.settings.domains.connect-domain')); ?></h1>
                <p class="sub-title">Connect a domain to your Webstore</p>
            </div>
            <div class="page-action">
                <a href="<?php echo e(route('admin.domains.custom')); ?>" class="btn btn-md btn-primary">
                    Connect Domain
                </a>
            </div>
        </div>
        <div class="page-content">
            <?php $domainGrid = app('App\DataGrids\DomainsDataGrid'); ?>
            <?php echo $domainGrid->render(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>