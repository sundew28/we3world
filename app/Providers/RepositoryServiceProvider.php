<?php

namespace App\Providers;

use App\Repository\EloquentRepositoryInterface; 
use App\Repository\ProductsRepositoryInterface; 
use App\Repository\Eloquent\ProductsRepository; 
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
