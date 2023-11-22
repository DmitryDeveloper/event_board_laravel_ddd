<?php

namespace Modules\Event\Application\Http\Controllers;

use Modules\Event\Application\DTOs\CreateCategoryData;
use Modules\Event\Domain\Services\CategoryService;
use Modules\Shared\Application\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $categoryService
    )
    {
    }

    public function create(CreateCategoryData $dto): void
    {
        $this->categoryService->create($dto);
    }

    public function index(): void
    {
        $this->categoryService->getAll();
    }
}
