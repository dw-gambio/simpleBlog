<?php


namespace App\Core\Middleware;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;
use TypeError;

class TypeErrorMiddleware
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
            } catch (TypeError $httpException) {
                $response = (new Response());
                $response->getBody()->write('invalid post id');

                return $response;
            }
    }
}