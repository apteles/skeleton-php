<?php

use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;

$strategy = new ApplicationStrategy;

$strategy->setContainer($container);
/**
 * @var Router $router
 */
$router->group('/module/app', function (\League\Route\RouteGroup $route) {
    $route->get('/', 'App\Modules\App\Controllers\HomeController::index');
})->setStrategy($strategy);

// $router->get('/module/app', )
// $router->map('GET', '/app', function (ServerRequestInterface $request) : ResponseInterface {
//     $response = new Laminas\Diactoros\Response;
//     $response->getBody()->write('<h1>Hello, app module!</h1>');
//     return $response;
// });
