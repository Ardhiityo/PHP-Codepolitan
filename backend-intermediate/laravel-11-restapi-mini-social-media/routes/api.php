<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware(['api', 'jwt']);

Route::prefix('/posts')->middleware(['api', 'jwt'])
    ->group(function () {
        Route::get('/', [PostController::class, 'index']);
        Route::post('/', [PostController::class, 'store']);
        Route::get('/{postId}', [PostController::class, 'show']);
        Route::delete('/{postId}', [PostController::class, 'destroy']);
        Route::patch('/{postId}', [PostController::class, 'update']);
    });
