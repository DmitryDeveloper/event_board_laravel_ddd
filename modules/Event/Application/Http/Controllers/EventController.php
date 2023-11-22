<?php

namespace Modules\Event\Application\Http\Controllers;

use Modules\Event\Domain\Services\EventService;
use Modules\Shared\Application\Http\Controllers\Controller;

class EventController extends Controller
{
    public function __construct(private readonly EventService $userService)
    {
    }
}
