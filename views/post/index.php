<?php include __DIR__ . "/../layout/header.php"; ?>

<ul>
  <?php foreach($posts as $post): ?>
    <li>
      <?php echo("{$post->title}"); ?>
    </li>
  <?php endforeach; ?>
</ul>

<?php include __DIR__ . "/../layout/footer.php"; ?>