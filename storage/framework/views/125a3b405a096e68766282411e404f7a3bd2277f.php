<?php $__env->startSection('title', 'Page Expired'); ?>

<?php $__env->startSection('message'); ?>
    <p>Your session has expired due to inactivity. <br>Click the button below to reload your session.</p>
	<a href="."><img src="https://res.cloudinary.com/webstore-cloud/image/upload/c_scale,w_50/v1570094567/Theme%20Manager/webstore-reload.svg" width="100px" alt="Reload Store Manager" /></a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors::layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>