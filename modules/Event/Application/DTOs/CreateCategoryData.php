<?php

namespace Modules\Event\Application\DTOs;

use Spatie\LaravelData\Data;

class CreateCategoryData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $description
    ) {
    }
}
