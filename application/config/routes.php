<?php

use League\Route\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

return static function (Router $router) {
    $router->map('GET', '/', function (ServerRequestInterface $request) : ResponseInterface {
        $response = new Laminas\Diactoros\Response;
        $response->getBody()->write('<h1>Hello, World!</h1>');
        return $response;
    });
};
