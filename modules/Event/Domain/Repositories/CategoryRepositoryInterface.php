<?php

namespace Modules\Event\Domain\Repositories;

use Illuminate\Support\Collection;
use Modules\Event\Application\DTOs\CreateCategoryData;

interface CategoryRepositoryInterface
{
    public function save(CreateCategoryData $data): void;

    public function getAll(): Collection;
}
