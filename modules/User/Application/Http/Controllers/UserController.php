<?php

namespace Modules\User\Application\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Shared\Application\Http\Controllers\Controller;
use Modules\User\Domain\Entities\User;
use Modules\User\Domain\Services\UserService;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function profile(): User
    {
        return $this->userService->getProfile(Auth::id());
    }
}
