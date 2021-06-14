<?php
$count = count(iterator_to_array($posts));
$title = "Sitemap {$count}";
include __DIR__ . "/../../Core/Layout/header.php"; ?>
<!--TODO: 2. implement a Template-Engine-->
<h1>Übersicht des Blogs</h1>
<p class="lead">Das hier ist die Übersicht des Blogs.</p>

<ul>
<?php foreach($posts as $post): ?>
    <li>
        <a href="post?id=<?php echo ($post->getId()->value())?>">
    <?php echo("[{$post->getId()->value()}] {$post->getTitle()->value()}"); ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>

<?php include __DIR__ . "/../../Core/Layout/footer.php"; ?>