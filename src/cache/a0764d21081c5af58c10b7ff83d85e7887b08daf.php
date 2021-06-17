

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>

    <h1>Error - 404</h1>
    <p class="lead">Die aufgerufene Seite konnte nicht gefunden werden</p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/blog/src/resources/views/error.blade.php ENDPATH**/ ?>