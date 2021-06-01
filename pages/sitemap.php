<?php 
include("./../init.php");

$postsController = $container->make("postsController");
$postsController->sitemap();
