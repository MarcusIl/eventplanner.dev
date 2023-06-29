<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Event routes
Route::post('/events', [EventController::class, 'create']);
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



Auth::routes();
// Custom authentication views
// Authentication Routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Password Reset Routes
Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset']);

// Email Verification Routes
Route::get('/email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');



