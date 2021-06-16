<?php

declare(strict_types=1);

namespace App\Core;

use Dotenv\Dotenv;

use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Middleware\ErrorMiddleware;
use Psr\Http\Message\ServerRequestInterface;

use Slim\Factory\AppFactory;
use Slim\Psr7\Response;


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