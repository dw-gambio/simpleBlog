<?php include("./../init.php") ?>
<?php include("./elements/header.php") ?>

<?php
// FIXME: CATCH ERROR MESSAGE IF NO/WRONG ID IS GIVEN 
    $postsRepository = $container->make("postsRepository");
    $id = $_GET['id'];
    $post = $postsRepository->fetchPost($id);
?>
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






<?php include("./elements/footer.php") ?>