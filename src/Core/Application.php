<?php

declare(strict_types=1);

namespace App\Core;

use Dotenv\Dotenv;
use League\Container\Container;
use Slim\Factory\AppFactory;


/**
 * Class Application
 *
 * @package App\Core
 */
class Application
{

    public static function main(): void
    {

        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->safeLoad();

        $container = new Container();
        $app = AppFactory::create(null, $container);

        $buildRecipes = require __DIR__ . "/container.php";
        $buildRecipes($container);

        $middleware = require __DIR__ . '/Middleware/middleware.php';
        $middleware($app);

        $routes = require __DIR__ . '/../Post/routes.php';
        $routes($app, $container);

        $app->run();
    }
}