<?php

namespace Modules\Event\Domain\Aggregates;

use Illuminate\Support\Collection;
use Modules\Event\Application\DTOs\CreateEventData;
use Modules\Event\Domain\Entities\Category;
use Modules\Event\Domain\ValueObjects\EventDetails;

class Event
{
    private string $userId;
    private EventDetails $eventDetails;
    private Collection $categories;

    public function __construct(
        EventDetails $eventDetails,
        int $userId,
    ) {
        $this->eventDetails = $eventDetails;
        $this->userId = $userId;
        $this->categories = new Collection();
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getEventDetails(): EventDetails
    {
        return $this->eventDetails;
    }
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): void
    {
        $this->categories->add($category);
    }

    public static function create(CreateEventData $dto): self
    {
        return new self(
            new EventDetails(
                $dto->shortDescription,
                $dto->description,
                $dto->userId,
                $dto->isApproved,
                $dto->status
            ),
            $dto->userId
        );
    }
}
