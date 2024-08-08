<?php

namespace App\Providers;

use App\Repositories\ProjectRepository;
use App\Repositories\RepositoryInterface;
use App\Services\ProjectService;
use App\Services\ServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(ServiceInterface::class, ProjectService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
