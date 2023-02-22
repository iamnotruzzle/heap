<?php

use App\Http\Controllers\Survey\Answers\AnswersController;
use App\Http\Controllers\Survey\English\EngController;
use App\Http\Controllers\Survey\Iloco\IlocoController;
use App\Http\Controllers\Survey\Tagalog\TagalogController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// change the login route
Route::redirect('/', 'login');


Route::resource('users', UserController::class)->middleware(['auth:sanctum', 'verified'])->only(['index', 'store', 'update', 'destroy']);


Route::resource('eng', EngController::class)->only(['index', 'store', 'update', 'destroy']);
Route::resource('iloco', IlocoController::class)->only(['index', 'store', 'update', 'destroy']);
Route::resource('tagalog', TagalogController::class)->only(['index', 'store', 'update', 'destroy']);
Route::resource('answers', AnswersController::class)->only(['index', 'store', 'update', 'destroy']);
