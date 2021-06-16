<?php

declare(strict_types=1);

use App\Core\Middleware\HttpNotFoundErrorMiddleware;
use Slim\App;

return function (App $app) {
//  add 404 middleware
    $app->add(HttpNotFoundErrorMiddleware::class);

//  Add Global Middleware
//  $app->addErrorMiddleware(true, true, false);



};