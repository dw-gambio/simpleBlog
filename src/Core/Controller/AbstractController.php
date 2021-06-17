<?php 

namespace App\Core\Controller;

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;

abstract class AbstractController 
{

    protected function render(Response $response, $template, $data = []): Response
    {
        $cache = __DIR__ . "/../../cache";
        $views = __DIR__ . "/../../resources/views";

        $blade = (new Blade($views, $cache))->make($template, $data);
        $response->getBody()->write($blade->render());

        return $response;
    }

}