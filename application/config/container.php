<?php

use League\Route\Router;
use Psr\Container\ContainerInterface;

return [
  'database.credentials' => function () {
      array(
         'driver'    => 'mysql',
         'host'    => '127.0.0.1',
         'port'    => '3306',
         'db_name'    => 'loja_virtual',
         'username'    => 'root',
         'password'    => 'secret',
         'default_fetch' => PDO::FETCH_CLASS
      );
  },
  Router::class => function (ContainerInterface $c) {
      return new Router();
  },
  FooInterface::class => function (ContainerInterface $c) {
      return new StdClass;
  }
];
