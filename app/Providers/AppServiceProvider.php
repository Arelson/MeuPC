<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $this->app->bind(\App\Repositories\ProdutoRepositoryRepository::class, \App\Repositories\ProdutoRepositoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BuildRepositoryRepository::class, \App\Repositories\BuildRepositoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepositoryEloquentRepository::class, \App\Repositories\UserRepositoryEloquentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BuildCompRepository::class, \App\Repositories\BuildCompRepositoryEloquent::class);
    }
}
