<?php

declare(strict_types=1);

use League\Container\Container;
use App\Core\Middleware\TypeErrorMiddleware;
use App\Post\Controller\PostController;
use Selective\BasePath\BasePathMiddleware;
use Slim\App;

return function (App $app, Container $container) {

//    $app->addRoutingMiddleware();

    // Set the base path to run the app in a subdirectory.
    // This path is used in urlFor().a
    $app->add(new BasePathMiddleware($app));

    // Define app routes
    $app->get('/',[PostController::class, 'index']);
    $app->get('/sitemap', [PostController::class, 'sitemap']);
    $app->get('/post-{id}', [PostController::class, 'post'])
        ->add(TypeErrorMiddleware::class);
    $app->post('/post-{id}', [PostController::class, 'addCommentToPost'])
        ->add(TypeErrorMiddleware::class);

    // Todo: 1.2. redo error handling with controller update
    $app->get('/404', [PostController::class, 'error']);


};