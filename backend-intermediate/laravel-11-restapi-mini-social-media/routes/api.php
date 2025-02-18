<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware(['api', 'jwt']);


Route::middleware(['api', 'jwt'])->group(function () {
    Route::prefix('/posts')
        ->group(function () {
            Route::get('/', [PostController::class, 'index']);
            Route::post('/', [PostController::class, 'store']);
            Route::get('/{postId}', [PostController::class, 'show']);
            Route::delete('/{postId}', [PostController::class, 'destroy']);
            Route::patch('/{postId}', [PostController::class, 'update']);
        });

    Route::prefix('/comments')->middleware(['api', 'jwt'])
        ->group(function () {
            Route::post('/', [CommentController::class, 'store']);
            Route::patch('/{commentId}', [CommentController::class, 'update']);
            Route::delete('/{commentId}', [CommentController::class, 'destroy']);
        });

    Route::prefix('/likes')->middleware(['api', 'jwt'])
        ->group(function () {
            Route::post('/{postId}', [LikeController::class, 'store']);
            Route::delete('/{likeId}', [LikeController::class, 'destroy']);
        });

    Route::prefix('/messages')->middleware(['api', 'jwt'])
        ->group(function () {
            Route::post('/', [MessageController::class, 'store']);
            Route::delete('/{messageId}', [MessageController::class, 'destroy']);
        });
});
