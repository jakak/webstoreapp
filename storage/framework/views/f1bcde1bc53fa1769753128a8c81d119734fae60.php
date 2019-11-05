<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.search.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <?php if(! $results): ?>
        <?php echo e(__('shop::app.search.no-results')); ?>

    <?php endif; ?>

    <?php if($results): ?>
        <div class="main mb-30" style="min-height: 27vh;">
            <?php if($results->isEmpty()): ?>
                <div class="search-result-status">
                    <h2><?php echo e(__('shop::app.products.whoops')); ?></h2>
                    <span><?php echo e(__('shop::app.search.no-results')); ?></span>
                </div>
            <?php else: ?>
                <?php if($results->count() == 1): ?>
                    <div class="search-result-status mb-20">
                        <span><b><?php echo e($results->count()); ?> </b><?php echo e(__('shop::app.search.found-result')); ?></span>
                    </div>
                <?php else: ?>
                    <div class="search-result-status mb-20">
                        <span><b><?php echo e($results->count()); ?> </b><?php echo e(__('shop::app.search.found-results')); ?></span>
                    </div>
                <?php endif; ?>
                
                <div class="product-grid-4">
                    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productFlat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php echo $__env->make('shop::products.list.card', ['product' => $productFlat->product], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php echo $__env->make('ui::datagrid.pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>