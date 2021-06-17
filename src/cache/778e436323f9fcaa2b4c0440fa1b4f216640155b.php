

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <h1>Startseite des Blogs</h1>
    <p class="lead">Das hier ist die Startseite des Blogs.</p>

    <ul>
        <?php foreach($posts as $post): ?>
        <li>
            <?php echo("{$post->getTitle()->value()}"); ?>
        </li>
        <?php endforeach; ?>
    </ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/blog/src/resources/views/index.blade.php ENDPATH**/ ?>