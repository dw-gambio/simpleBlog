

<?php $__env->startSection('title', "{$title} {$id}"); ?>

<?php $__env->startSection('content'); ?>
    <h1>Post.php</h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php echo("[{$post->getId()->value()}] " . $post->getTitle()->value()); ?>
            </h3>
        </div>
        <div class="panel-body">
            <p>
                <?php echo nl2br($post->getContent()->value()); ?>
            </p>
        </div>
    </div>

    <ul class="list-group">
        <?php foreach($comments AS $comment): ?>
        <li class="list-group-item">
            <?php echo $comment->getContent()->value(); ?>
        </li>
        <?php endforeach; ?>
    </ul>

    <form action="post-<?php echo $post->getId()->value();?>" method="post">
        <textarea name="content" class="form-control" style="resize:none; margin-bottom:2rem;"></textarea>
        <input type="submit" value="Add comment" class="btn btn-primary">
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/blog/src/resources/views/post.blade.php ENDPATH**/ ?>