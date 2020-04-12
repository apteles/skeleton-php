<?php
declare(strict_types=1);

namespace MailMarketing\Core;

interface ModuleInterface
{
    public function getNamespaces(): array;
    
    public function getContainerConfig(): string;
    
    public function getEventConfig(): string;
    
    public function getMiddlewareConfig(): string;

    public function getRouteConfig(): string;
}
