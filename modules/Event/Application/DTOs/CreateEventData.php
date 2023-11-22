<?php

namespace Modules\Event\Application\DTOs;

use Spatie\LaravelData\Data;

class CreateEventData extends Data
{
    public function __construct(
        public string $title,
        public string $shortDescription,
        public string $description,
        public int $userId,
        public bool $isApproved,
        public string $status,
        public array $categories
    ) {
    }
}
