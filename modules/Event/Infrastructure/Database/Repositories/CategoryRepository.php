<?php

namespace Modules\Event\Infrastructure\Database\Repositories;

use Illuminate\Support\Collection;
use Modules\Event\Application\DTOs\CreateCategoryData;
use Modules\Event\Domain\Repositories\CategoryRepositoryInterface;
use Modules\Event\Infrastructure\Database\Models\Category as CategoryModel;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected CategoryModel $model;

    public function __construct(CategoryModel $model)
    {
        $this->model = $model;
    }

    public function save(CreateCategoryData $data): void
    {
        $this->model->save($data->toArray());
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }
}
