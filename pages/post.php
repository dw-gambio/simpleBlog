<?php 
include("./../init.php");

// FIXME: CATCH NOTICE MESSAGE IF NO/WRONG ID IS GIVEN 
$postsController = $container->make("postsController");
$postsController->show();
