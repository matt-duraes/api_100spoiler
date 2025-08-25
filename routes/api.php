<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route::get('/users', [UserController::class, 'index']);

Route::apiResource('users', UserController::class);
Route::apiResource('books', BookController::class);
