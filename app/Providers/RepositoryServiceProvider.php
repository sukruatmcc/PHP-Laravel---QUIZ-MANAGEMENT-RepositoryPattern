<?php

namespace App\Providers;

use App\Interfaces\IAdminRepositoryInterface;
use App\Repositories\AdminRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->bindRepositories();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function bindRepositories()
    {
        $this->app->bind(IAdminRepositoryInterface::class, AdminRepository::class);
    }
}
