<?php

namespace Modules\Event\Domain\ValueObjects;

use Modules\Event\Application\DTOs\CreateEventData;
use Modules\Event\Domain\Entities\Category;

class EventDetails
{
    private string $title;
    private string $shortDescription;
    private string $description;
    private string $status;

    private bool $isApproved;

    public function __construct(
        string $title,
        string $shortDescription,
        string $description,
        string $status,
        bool $isApproved
    ) {
        $this->title = $title;
        $this->shortDescription = $shortDescription;
        $this->description = $description;
        $this->status = $status;
        $this->isApproved = $isApproved;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function isApproved(): bool
    {
        return $this->isApproved;
    }
}
