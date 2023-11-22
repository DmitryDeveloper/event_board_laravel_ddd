<?php

use Modules\User\Application\Http\Controllers\AuthController;
use Modules\User\Application\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/api/register', [AuthController::class, 'register']);

Route::middleware(['api', 'auth'])->group(function () {
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::get('profile', [EventController::class, 'profile']);
});
