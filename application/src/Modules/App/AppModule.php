<?php
declare(strict_types=1);
namespace App\Module\App;

use MailMarketing\Core\ModuleInterface;

class AppModule implements ModuleInterface
{
    public function getNamespaces(): array
    {
        return [
        'App\\Modules\\App\\' => __DIR__ . '/src'
      ];
    }
    public function getContainerConfig(): string
    {
        return __DIR__ . '/config/container.php';
    }
    public function getEventConfig(): string
    {
        return __DIR__ . '/config/events.php';
    }
    public function getMiddlewareConfig(): string
    {
        return __DIR__ . '/config/middlewares.php';
    }
    public function getRouteConfig(): string
    {
        return __DIR__ . '/config/routes.php';
    }
}
