<?php

namespace Modules\Event\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Domain\Repositories\EventRepositoryInterface;
use Modules\User\Infrastructure\Database\Repositories\EventRepository;

class EventServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
    }
}
