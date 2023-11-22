<?php

namespace Modules\User\Infrastructure\Database\Repositories;

use Modules\User\Domain\Entities\User;
use Modules\User\Domain\Repositories\EventRepositoryInterface;
use Modules\User\Infrastructure\Database\Models\User as UserModel;

class EventRepository implements EventRepositoryInterface
{
    protected UserModel $model;

    public function __construct(UserModel $model)
    {
        $this->model = $model;
    }

    public function save(User $user): void
    {
        $this->model->create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ]);
    }

    public function find(string $userId): User
    {
        $userData = $this->model->findOrFail($userId);

        return new User(
            $userData->name,
            $userData->email,
            ''
        );
    }
}
