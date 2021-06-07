<?php 

require __DIR__ . "/../init.php";

$pathInfo = $_SERVER['PATH_INFO'];

$routes = [
    '/index' => [
        'controller' => 'postsController',
        'method' => 'index'
    ],
    '/sitemap' => [
        'controller' => 'postsController',
        'method' => 'sitemap'
    ],
    '/post' => [
        'controller' => 'postsController',
        'method' => 'show'
    ],
];

// CATCH WRONG URL AND REDIRECT TO /index
if(!isset($routes[$pathInfo])){
    $pathInfo = '/index';
}

$route = $routes[$pathInfo];
$controller = $container->make($route['controller']);
$method = $route['method'];
$controller->$method();