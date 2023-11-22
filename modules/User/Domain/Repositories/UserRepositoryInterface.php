<?php

namespace Modules\User\Domain\Repositories;

use Modules\User\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function save(User $user): void;

    public function find(string $userId): User;
}
