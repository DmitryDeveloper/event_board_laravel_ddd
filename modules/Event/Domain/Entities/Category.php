<?php

namespace Modules\Event\Domain\Entities;

readonly class Category
{
    public function __construct(
        private string $name,
        private string $description,
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
