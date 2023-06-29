<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Root route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Event routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events', [EventController::class, 'create'])->name('events.create');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Guest routes
Route::post('/events/{event}/guests', [GuestController::class, 'create'])->name('guests.create');
Route::put('/events/{event}/guests/{guest}', [GuestController::class, 'update'])->name('guests.update');
Route::delete('/events/{event}/guests/{guest}', [GuestController::class, 'delete'])->name('guests.delete');

// Task routes
Route::post('/events/{event}/tasks', [TaskController::class, 'create'])->name('tasks.create');
Route::put('/events/{event}/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/events/{event}/tasks/{task}', [TaskController::class, 'delete'])->name('tasks.delete');

// Budget routes
Route::post('/events/{event}/budgets', [BudgetController::class, 'create'])->name('budgets.create');
Route::put('/events/{event}/budgets/{budget}', [BudgetController::class, 'update'])->name('budgets.update');
Route::delete('/events/{event}/budgets/{budget}', [BudgetController::class, 'delete'])->name('budgets.delete');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Password Reset Routes
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset']);

// Email Verification Routes
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');







