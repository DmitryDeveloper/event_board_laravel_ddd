<?php

use Modules\Event\Application\Http\Controllers\EventController;
use Modules\Event\Application\Http\Controllers\CategoryController;
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

Route::get('/api/categories', [CategoryController::class, 'index']);
Route::get('/api/categories/{id}/events', [EventController::class, 'getCategoryEvents']);
Route::get('/api/events/{id}', [EventController::class, 'show']);

Route::middleware(['api', 'auth'])->group(function () {
    Route::post('/api/categories', [CategoryController::class, 'create']);
    Route::put('/api/categories', [CategoryController::class, 'update']);
    Route::delete('/api/categories/{id}', [EventController::class, 'delete']);

    Route::post('/api/events', [EventController::class, 'create']);
    Route::put('/api/events', [EventController::class, 'update']);
    Route::delete('/api/events/{id}', [EventController::class, 'delete']);

    Route::post('/api/events/{id}/subscribe', [EventController::class, 'subscribe']);
    Route::post('/api/events/{id}/unsubscribe', [EventController::class, 'unsubscribe']);

    Route::post('/api/events/{id}/categories', [EventController::class, 'addCategoryToEvent']);
});
