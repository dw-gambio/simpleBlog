<?php

declare(strict_types=1);

use App\Core\Container;
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
    $app->get('/', [$container->make(PostController::class), 'index']);
    $app->get('/sitemap', [$container->make(PostController::class), 'sitemap']);
    $app->get('/post-{id}', [$container->make(PostController::class), 'post'])
        ->add(TypeErrorMiddleware::class);
    $app->post('/post-{id}', [$container->make(PostController::class), 'addCommentToPost'])
        ->add(TypeErrorMiddleware::class);

    // Todo: 2.2. redo error handling with controller update
    $app->get('/404', [$container->make(PostController::class), 'error']);


};