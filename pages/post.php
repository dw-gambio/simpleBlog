<?php 
include("./../init.php");

// FIXME: CATCH ERROR MESSAGE IF NO/WRONG ID IS GIVEN 
$postsController = $container->make("postsController");
$postsController->show();
