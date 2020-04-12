<?php
declare(strict_types=1);
namespace App\Modules\App\Controllers;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use MailMarketing\Core\Contracts\ViewInterface;

class HomeController
{
    private ViewInterface $view;

    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
    }

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $view = $this->view->render('/app/index.twig');
        $response = new Response();
        $response->getBody()->write($view);
        return $response;
    }
}
