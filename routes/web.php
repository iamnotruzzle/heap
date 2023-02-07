<?php

use App\Http\Controllers\Survey\PssController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// change the login route
Route::any('/login');


Route::resource('users', UserController::class)->middleware(['auth:sanctum', 'verified'])->only(['index', 'store', 'update', 'destroy']);

Route::resource('/pss', PssController::class)->only(['index', 'store', 'update', 'destroy']);
