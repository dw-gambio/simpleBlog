<?php


namespace App\Core\Middleware;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Response;

class HttpNotFoundErrorMiddleware
{

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface|Response
     */
    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler)
    {
        try {
                return $handler->handle($request);
            } catch (HttpNotFoundException $httpException) {
                $response = (new Response())->withHeader('Location', './404')->withStatus(404);

                return $response;
            }
    }
}