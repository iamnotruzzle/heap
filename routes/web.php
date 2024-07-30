<?php

use App\Http\Controllers\Survey\Answers\AnswersController;
use App\Http\Controllers\Survey\Questions\QuestionController;
use App\Http\Controllers\Users\Profile\ProfileController;
use App\Http\Controllers\Users\Register\RegisterController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// change the login route
Route::redirect('/', 'login');


Route::resource('users', UserController::class)->middleware(['auth:sanctum', 'verified', 'role_restriction'])->only(['index', 'store', 'update', 'destroy']);
Route::resource('profile', ProfileController::class)->middleware(['auth:sanctum', 'verified'])->only(['index', 'store', 'update', 'destroy']);
Route::resource('register', RegisterController::class)->only(['index', 'store']);


Route::resource('answers', AnswersController::class)->middleware(['auth:sanctum', 'verified'])->only(['index', 'store', 'update', 'destroy']);
Route::resource('survey', QuestionController::class)->only(['index', 'store', 'update', 'destroy']);
// Route::resource('deleterequest', DeleteRequestController::class)->middleware(['auth:sanctum', 'verified'])->only(['index', 'store', 'update', 'destroy']);
