<?php 
$title = "Post {$id}";
include __DIR__ . "/../layout/header.php"; ?>

<h1>Post.php</h1>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php echo("[{$id}] " . $post->title); ?>
        </h3>
    </div>
    <div class="panel-body">
        <p>
            <?php echo nl2br($post->content); ?>
        </p>
    </div>
</div>

<ul class="list-group">
    <?php foreach($comments AS $comment): ?>
        <li class="list-group-item">
            <?php echo $comment->content; ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__ . "/../layout/footer.php"; ?>