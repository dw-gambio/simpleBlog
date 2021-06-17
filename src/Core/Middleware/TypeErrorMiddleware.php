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
                $response->getBody()->write("
                    <html><head>
                    <title>404 Not Found</title>
                    </head><body>
                    <h1>Not Found</h1>
                    <p>The requested URL {$request->getUri()->getPath()} was not found on this server.</p>
                    </body></html>
                ");

                return $response;
            }
    }
}