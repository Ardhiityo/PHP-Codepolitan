<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\AuthService;
use App\Services\Interfaces\LikeService;
use App\Services\Interfaces\PostService;
use App\Services\Interfaces\CommentService;
use App\Services\Interfaces\MessageService;
use App\Services\Repositories\AuthRepository;
use App\Services\Repositories\LikeRepository;
use App\Services\Repositories\PostRepository;
use App\Services\Repositories\CommentRepository;
use App\Services\Repositories\MessageRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthService::class, AuthRepository::class);
        $this->app->bind(PostService::class, PostRepository::class);
        $this->app->bind(CommentService::class, CommentRepository::class);
        $this->app->bind(LikeService::class, LikeRepository::class);
        $this->app->bind(MessageService::class, MessageRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
