<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Startseite des Blogs</h1>
<p class="lead">Das hier ist die Startseite des Blogs.</p>

<ul>
  <?php foreach($posts as $post): ?>
    <li>
      <?php echo("{$post->title}"); ?>
    </li>
  <?php endforeach; ?>
</ul>

<?php include __DIR__ . "/../layout/footer.php"; ?>