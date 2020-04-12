<?php
declare(strict_types=1);

namespace MailMarketing\Core;

use Composer\Autoload\ClassLoader;
use DI\Container;

class ModuleRegistry
{
    private $app;

    private $composer;

    private array $modules = [];

    public function setApp(Application $app): void
    {
        $this->app = $app;
    }

    public function setComposer(ClassLoader $composer): void
    {
        $this->composer = $composer;
    }

    public function addModule(ModuleInterface $module): void
    {
        $this->modules[] = $module;
    }

    private function registry(ModuleInterface $module): void
    {
        $app = $this->app;
        $router = $app->getRouter();
        /**
         * @var Container $container
         */
        $container = $app->getContainer();

        $this->registerModuleInAutoload($module->getNamespaces());

        require_once $module->getContainerConfig();
        require_once $module->getEventConfig();
        require_once $module->getMiddlewareConfig();
        require_once $module->getRouteConfig();
    }

    private function registerModuleInAutoload(array $namespaces): void
    {
        foreach ($namespaces as $prefix => $path) {
            $this->composer->setPsr4($prefix, $path);
        }
    }

    public function run()
    {
        foreach ($this->modules as $module) {
            $this->registry($module);
        }
    }
}
