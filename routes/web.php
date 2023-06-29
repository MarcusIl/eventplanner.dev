<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('dashboard.home');


// Event routes
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events', [EventController::class, 'create'])->name('events.create');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::middleware('role:Admin')->get('/events', [EventController::class, 'index']);

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
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.showLinkRequestForm')->withoutMiddleware('auth');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.sendResetLinkEmail')->withoutMiddleware('auth');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.showResetForm')->withoutMiddleware('auth');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.performReset')->withoutMiddleware('auth');

// Email Verification Routes
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice')->middleware('auth');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware('auth');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // Routes accessible to all authenticated users
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['role:admin'])->group(function () {
        // Routes accessible to users with the 'admin' role
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        // Add more admin routes as needed
    });

    Route::middleware(['role:moderator'])->group(function () {
        // Routes accessible to users with the 'moderator' role
        Route::get('/moderator', [ModeratorController::class, 'index'])->name('moderator.dashboard');
        // Add more moderator routes as needed
    });

    Route::middleware(['role:organizer'])->group(function () {
        // Routes accessible to users with the 'organizer' role
        Route::get('/organizer', [OrganizerController::class, 'index'])->name('organizer.dashboard');
        // Add more organizer routes as needed
    });

    Route::middleware(['role:guest'])->group(function () {
        // Routes accessible to users with the 'guest' role
        Route::get('/guest', [GuestController::class, 'index'])->name('guest.dashboard');
        // Add more guest routes as needed
    });
});
