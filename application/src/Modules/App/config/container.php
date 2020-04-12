<?php

use MailMarketing\Core\Contracts\ViewInterface;
use MailMarketing\Core\Views\View;
use Twig\Loader\FilesystemLoader;

/**
* @var DI\Container $container
*/
  
$container->set(ViewInterface::class, new View(new FilesystemLoader(__DIR__ .'/../resources/views')));
