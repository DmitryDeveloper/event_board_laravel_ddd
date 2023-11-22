<?php

namespace Modules\Event\Domain\Repositories;

use Illuminate\Support\Collection;
use Modules\Event\Domain\Aggregates\Event;

interface EventRepositoryInterface
{
    public function save(Event $event): void;

    public function delete(string $id): void;

    public function find(string $eventId): Event;

    public function findByCategoryId(string $categoryId): Collection;
}
