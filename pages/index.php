<?php
include("./../init.php");

$postsController = $container->make("postsController");
$postsController->index();
/*
include("./elements/header.php");
?>

<h1>Startseite des Blogs</h1>
<p class="lead">Das hier ist die Startseite des Blogs.</p>

<?php
  $postsRepository = $container->make("postsRepository");
  $res = $postsRepository->fetchPosts();
?>

<ul>
  <?php foreach($res as $row): ?>
    <li>
      <?php echo("{$row->title}"); ?>
    </li>
  <?php endforeach; ?>
</ul>

<?php include("./elements/footer.php") */?>