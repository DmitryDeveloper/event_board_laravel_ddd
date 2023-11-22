<?php

namespace Modules\User\Domain\Services;

use Illuminate\Support\Facades\Hash;
use Modules\User\Application\DTOs\RegistrationData;
use Modules\User\Domain\Entities\User;
use Modules\User\Domain\Repositories\EventRepositoryInterface;

readonly class UserService
{
    public function __construct(private EventRepositoryInterface $userRepository)
    {
    }

    public function register(RegistrationData $data): string
    {
        $user = new User(
            $data->name,
            $data->email,
            Hash::make($data->password)
        );

        $this->userRepository->save($user);

        return auth()->attempt([
            'email' => $user->getEmail(),
            'password' => $data['password'] ?? null
        ]);
    }

    public function getProfile(string $userId): User
    {
        return $this->userRepository->find($userId);
    }
}
