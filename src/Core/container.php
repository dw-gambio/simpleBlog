<?php

declare(strict_types=1);

use App\Core\Database;
use League\Container\Container;

return function (Container $container) {

    $container->defaultToShared(true);

    $container->add(Database::class);

    $postContainer = require __DIR__ . "/../Post/postContainer.php";
    $postContainer($container);
};