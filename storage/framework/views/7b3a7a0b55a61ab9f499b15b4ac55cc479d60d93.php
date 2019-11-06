<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.settings.channels.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.settings.channels.title')); ?></h1>
                <p><?php echo e(__('admin::app.settings.channels.sub-title')); ?></p>
            </div>

            <div class="page-action">
                <a href="<?php echo e(route('admin.channels.edit', $channel->id)); ?>" class="btn btn-md btn-primary">
                    <?php echo e(__('admin::app.settings.channels.edit-title')); ?>

                </a>
            </div>
        </div>

        <div class="page-content">
            <div class="table">
                <table class="table">
                    <thead>
                        <tr style="height: 50px;">
                            <th class="grid_head">
                                Webstore Name
                            </th>
                            <th class="grid_head">
                                Webstore Title
                            </th>
                            <th class="grid_head">
                                Hostname
                            </th>
                            <th class="grid_head">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo e($channel->name); ?></td>
                            <td><?php echo e($channel->business_name); ?></td>
                            <td><?php echo e($channel->hostname); ?></td>
                            <td style="text-transform: capitalize"><?php echo e($channel->status); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>