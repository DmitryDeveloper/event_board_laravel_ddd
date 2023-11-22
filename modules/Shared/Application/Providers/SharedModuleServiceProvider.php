<?php

declare(strict_types=1);

namespace Modules\Shared\Application\Providers;

class SharedModuleServiceProvider extends AbstractModuleServiceProvider
{
    protected function getModuleNamespace(): string
    {
        return '\Modules\Shared';
    }

    protected function getModulePath(): string
    {
        return 'modules/Shared';
    }

    protected function getProvidersStack(): array
    {
        return [
        ];
    }
}
