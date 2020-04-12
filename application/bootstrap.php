<?php

use DI\ContainerBuilder;
use MailMarketing\Core\Application;

$autoload = require_once __DIR__ . '/vendor/autoload.php';
$modules = require_once __DIR__ . '/config/modules.php';
$container = require_once __DIR__ . '/config/container.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions($container);

$app = new Application($settings = [], $autoload);
$app->setContainer($containerBuilder->build());
$app->defineModules($modules)->init();

//(require_once __DIR__. '/config/routes.php')($app->getRouter());
