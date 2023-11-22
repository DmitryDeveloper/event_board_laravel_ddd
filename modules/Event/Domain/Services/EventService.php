<?php

namespace Modules\Event\Domain\Services;

use Illuminate\Support\Collection;
use Modules\Event\Application\DTOs\CreateEventData;
use Modules\Event\Domain\Aggregates\Event;
use Modules\Event\Domain\Repositories\EventRepositoryInterface;

readonly class EventService
{
    public function __construct(private readonly EventRepositoryInterface $eventRepository)
    {
    }

    public function create(CreateEventData $dto): void
    {
        $event = Event::create($dto);
        $this->eventRepository->save($event);
    }

    public function deleteEvent(string $id): void
    {
        $this->eventRepository->delete($id);
    }

    public function getCategoryEvents(string $categoryId): Collection
    {
        return $this->eventRepository->findByCategoryId($categoryId);
    }

    public function getEvent(string $eventId): Event
    {
        return $this->eventRepository->find($eventId);
    }
}
