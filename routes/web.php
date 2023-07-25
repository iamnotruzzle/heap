<?php

use App\Http\Controllers\Survey\Answers\AnswersController;
use App\Http\Controllers\Survey\DeleteRequests\DeleteRequestController;
use App\Http\Controllers\Survey\English\EnglishController;
use App\Http\Controllers\Survey\Iloco\IlocoController;
use App\Http\Controllers\Survey\Tagalog\TagalogController;
use App\Http\Controllers\Users\Register\RegisterController;
use App\Http\Controllers\Users\UserController;
use App\Models\DeleteRequest;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// change the login route
Route::redirect('/', 'login');


Route::resource('users', UserController::class)->middleware(['auth:sanctum', 'verified', 'role_restriction'])->only(['index', 'store', 'update', 'destroy']);
Route::resource('register', RegisterController::class)->only(['index', 'store']);


Route::resource('eng', EnglishController::class)->middleware(['auth:sanctum', 'verified'])->only(['index', 'store', 'update', 'destroy']);
Route::resource('iloco', IlocoController::class)->middleware(['auth:sanctum', 'verified'])->only(['index', 'store', 'update', 'destroy']);
Route::resource('tagalog', TagalogController::class)->middleware(['auth:sanctum', 'verified'])->only(['index', 'store', 'update', 'destroy']);
Route::resource('answers', AnswersController::class)->middleware(['auth:sanctum', 'verified'])->only(['index', 'store', 'update', 'destroy']);
Route::resource('deleterequest', DeleteRequestController::class)->middleware(['auth:sanctum', 'verified'])->only(['index', 'store', 'update', 'destroy']);
