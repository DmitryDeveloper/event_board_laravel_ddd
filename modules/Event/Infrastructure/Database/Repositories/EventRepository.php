<?php

namespace Modules\Event\Infrastructure\Database\Repositories;

use Modules\Event\Infrastructure\Database\Models\Event as EventModel;
use Modules\Event\Domain\Repositories\EventRepositoryInterface;

class EventRepository implements EventRepositoryInterface
{
    protected EventModel $model;

    public function __construct(EventModel $model)
    {
        $this->model = $model;
    }
}
