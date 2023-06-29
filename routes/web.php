<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('/', [EventController::class, 'index']);

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

// Authentication Routes
Route::get('/login', 'LoginController@showLoginForm')->name('login');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout')->name('logout');

// Registration Routes
Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'RegisterController@register');

// Password Reset Routes
Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'ResetPasswordController@reset');

// Email Verification Routes
Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');



