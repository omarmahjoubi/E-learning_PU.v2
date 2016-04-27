<?php $__env->startSection('content'); ?>

    <h1>Hello, <?php echo $url; ?></h1>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>