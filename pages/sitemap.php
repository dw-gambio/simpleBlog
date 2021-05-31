<?php include("./../init.php") ?>
<?php include("./elements/header.php") ?>

<h1>Übersicht des Blogs</h1>
<p class="lead">Das hier ist die Übersicht des Blogs.</p>

<?php 
$postsRepository = $container->make("postsRepository");
$res = $postsRepository->fetchPosts();
?>

<ul>
<?php foreach($res as $row): ?>
    <li>
        <a href="post.php?id=<?php echo ($row->id)?>">
    <?php echo("[{$row->id}] {$row->title}"); ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>

<?php include("./elements/footer.php") ?>