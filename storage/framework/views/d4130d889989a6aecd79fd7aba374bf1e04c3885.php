<?php $__env->startSection('content-wrapper'); ?>
    <div class="account-content">
        <?php echo $__env->make('shop::customers.account.partials.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <h1>Account Index Page</h1>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>