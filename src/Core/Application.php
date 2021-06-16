<?php

declare(strict_types=1);

namespace App\Core;

use Dotenv\Dotenv;

use Slim\Factory\AppFactory;


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

        $middleware = require __DIR__ . '/Middleware/middleware.php';
        $middleware($app);

        $routes = require __DIR__ . '/routes.php';
        $routes($app, $container);

        $app->run();
    }
}