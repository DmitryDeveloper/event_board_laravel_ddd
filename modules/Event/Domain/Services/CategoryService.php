<?php

namespace Modules\Event\Domain\Services;

use Illuminate\Support\Collection;
use Modules\Event\Application\DTOs\CreateCategoryData;
use Modules\Event\Domain\Repositories\CategoryRepositoryInterface;

readonly class CategoryService
{
    public function __construct(private readonly CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function create(CreateCategoryData $dto): void
    {
        $this->categoryRepository->save($dto);
    }

    public function getAll(): Collection
    {
        return $this->categoryRepository->getAll();
    }
}
