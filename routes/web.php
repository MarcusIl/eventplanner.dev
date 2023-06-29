<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Event routes
Route::post('/events', [EventController::class, 'index']);
Route::get('/events/{event}', [EventController::class, 'show']);

// Guest routes
Route::post('/events/{event}/guests', [GuestController::class, 'create']);
Route::put('/events/{event}/guests/{guest}', [GuestController::class, 'update']);
Route::delete('/events/{event}/guests/{guest}', [GuestController::class, 'delete']);

// Task routes
Route::post('/events/{event}/tasks', [TaskController::class, 'create']);
Route::put('/events/{event}/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/events/{event}/tasks/{task}', [TaskController::class, 'delete']);

// Budget routes
Route::post('/events/{event}/budgets', [BudgetController::class, 'create']);
Route::put('/events/{event}/budgets/{budget}', [BudgetController::class, 'update']);
Route::delete('/events/{event}/budgets/{budget}', [BudgetController::class, 'delete']);

// Add other routes for additional functionality as needed

