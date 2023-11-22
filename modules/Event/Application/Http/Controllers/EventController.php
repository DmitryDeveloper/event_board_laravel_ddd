<?php

namespace Modules\Event\Application\Http\Controllers;


use Illuminate\Support\Collection;
use Modules\Event\Application\DTOs\CreateEventData;
use Modules\Event\Domain\Aggregates\Event;
use Modules\Event\Domain\Services\EventService;
use Modules\Shared\Application\Http\Controllers\Controller;

class EventController extends Controller
{
    public function __construct(private readonly EventService $eventService)
    {
    }

    public function create(CreateEventData $dto): void
    {
        $this->eventService->create($dto);
    }

    public function delete(string $eventId): void
    {
        $this->eventService->deleteEvent($eventId);
    }

    public function getCategoryEvents(string $categoryId): Collection
    {
        return $this->eventService->getCategoryEvents($categoryId);
    }

    public function show(string $eventId): Event
    {
        return $this->eventService->getEvent($eventId);
    }
}
