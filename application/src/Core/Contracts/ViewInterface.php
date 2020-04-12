<?php
declare(strict_types=1);

namespace MailMarketing\Core\Contracts;

interface ViewInterface
{
    public function render($name, array $context = []): string;
}
