<?php
declare(strict_types=1);
namespace MailMarketing\Core;

use Composer\Autoload\ClassLoader;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;

class Application
{
    private array $settings = [];

    private ClassLoader $composer;

    private array $modules = [];

    private ContainerInterface $container;

    private RequestInterface $request;


    public function __construct(array $settings, ClassLoader $composer = null)
    {
        $this->settings = $settings;
        $this->composer = $composer;
    }

    public function init(): void
    {
        $this->registerModules();

        $this->request = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );

        if (getenv('environment') === 'development') {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        }
    }

    public function setContainer(ContainerInterface $container): void
    {
        $this->container = $container;
    }

    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    public function getRouter(): Router
    {
        if (!$this->container->has(Router::class)) {
            $router = new Router;
            $this->container->set(Router::class, $router);
            return $router;
        }
        return $this->container->get(Router::class);
    }

    public function setView()
    {
        if (!$this->container->has(Router::class)) {
            $router = new Router;
            $this->container->set(Router::class, $router);
            return $router;
        }
        return $this->container->get(Router::class);
    }

    public function defineModules(array $modules): Application
    {
        foreach ($modules as $file => $module) {
            $this->modules[$file] = $module;
        }

        return $this;
    }

    private function registerModules(): void
    {
        if (!$this->modules) {
            return;
        }

        $registry = new ModuleRegistry;

        $registry->setApp($this);
        $registry->setComposer($this->composer);

        foreach ($this->modules as $file => $module) {
            require $file;
            $registry->addModule(new $module);
        }

        $registry->run();
    }

    public function dispatch()
    {
        $response = $this->getRouter()->dispatch($this->request);
        (new SapiEmitter)->emit($response);
    }
}
