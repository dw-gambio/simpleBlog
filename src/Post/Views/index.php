<?php 
$title = "Startseite";
include __DIR__ . "/../../Core/Layout/header.php"; ?>
<!--TODO: 2. implement a Template-Engine-->
<h1>Startseite des Blogs</h1>
<p class="lead">Das hier ist die Startseite des Blogs.</p>

<ul>
  <?php foreach($posts as $post): ?>
    <li>
      <?php echo("{$post->getTitle()->value()}"); ?>
    </li>
  <?php endforeach; ?>
</ul>

<?php include __DIR__ . "/../../Core/Layout/footer.php"; ?>