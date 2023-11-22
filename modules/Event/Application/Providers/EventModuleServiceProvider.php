<?php

declare(strict_types=1);

namespace Modules\Event\Application\Providers;

use Modules\Shared\Application\Providers\AbstractModuleServiceProvider;

class EventModuleServiceProvider extends AbstractModuleServiceProvider
{
    protected function getModuleNamespace(): string
    {
        return '\Modules\Event';
    }

    protected function getModulePath(): string
    {
        return 'modules/Event';
    }

    protected function getProvidersStack(): array
    {
        return [
            // put module providers here
            EventServiceProvider::class
        ];
    }
}
