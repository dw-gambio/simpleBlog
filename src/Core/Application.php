<?php

declare(strict_types=1);

namespace App\Core;

use Dotenv\Dotenv;

use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;


use App\Post\Controller\PostController;

/**
 * Class Application
 *
 * @package App\Core
 */
class Application
{

    public static function main(Container $container): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->safeLoad();

        $app = AppFactory::create();
        $app->addRoutingMiddleware();

        // Set the base path to run the app in a subdirectory.
        // This path is used in urlFor().
        $app->add(new BasePathMiddleware($app));

        $app->addErrorMiddleware(true, true, true);

//        TODO: fix routing after implementing new container
        $postController = $container->make(PostController::class);
        // Define app routes
        $app->get('/', [$postController, 'index']);
        $app->get('/sitemap', [$postController, 'sitemap']);
        $app->get('/post-{id}', [$postController, 'post']);
        $app->post('/post-{id}', [$postController, 'addCommentToPost']);


        $app->run();

////      TODO: 1. implement better routing through .htaccess (slim?)
//        $routes = [
//            '/index' => [
//                'controller' => PostController::class,
//                'method' => 'index',
//            ],
//            '/sitemap' => [
//                'controller' => PostController::class,
//                'method' => 'sitemap',
//            ],
//            '/post' => [
//                'controller' => PostController::class,
//                'method' => 'post',
//            ],
//        ];
//
//        $pathInfo = $_SERVER['PATH_INFO'] ?? null;
//
//        // CATCH WRONG URL AND REDIRECT TO /index
//        if (!isset($routes[$pathInfo])) {
//            $pathInfo = '/index';
//        }
//
//        $route = $routes[$pathInfo];
//        $controller = $container->make($route['controller']);
//
//        $method = $route['method'];
//        $controller->$method();
    }
}