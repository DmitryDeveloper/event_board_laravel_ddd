<?php

namespace Modules\User\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Domain\Repositories\EventRepositoryInterface;
use Modules\User\Infrastructure\Database\Repositories\EventRepository;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
    }
}
