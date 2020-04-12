<?php
namespace MailMarketing\Core\Contracts;

use Psr\Container\ContainerInterface as ContainerContainerInterface;

interface ContainerInterface extends ContainerContainerInterface
{
    public function set(string $name, $value): void;
}
