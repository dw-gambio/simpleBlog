<?php

declare(strict_types=1);

namespace App\Core;

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
//      TODO: implement better routing through .htaccess
        $routes   = [
            '/index'   => [
                'controller' => PostController::class,
                'method'     => 'index',
            ],
            '/sitemap' => [
                'controller' => PostController::class,
                'method'     => 'sitemap',
            ],
            '/post'    => [
                'controller' => PostController::class,
                'method'     => 'post',
            ],
        ];
        
        $pathInfo = $_SERVER['PATH_INFO'] ?? null;
        
        // CATCH WRONG URL AND REDIRECT TO /index
        if (!isset($routes[$pathInfo])) {
            $pathInfo = '/index';
        }
        
        $route      = $routes[$pathInfo];
        $controller = $container->make($route['controller']);
        
        $method     = $route['method'];
        $controller->$method();
    }
}