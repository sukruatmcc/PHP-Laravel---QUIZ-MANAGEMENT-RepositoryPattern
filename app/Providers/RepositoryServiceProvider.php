<?php

namespace App\Providers;

use App\Interfaces\IExamRepositoryInterface;
use App\Interfaces\IStudentRepositoryInterface;
use App\Repositories\ExamRepository;
use App\Repositories\StudentRepository;
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
        $this->app->bind(IStudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(IExamRepositoryInterface::class, ExamRepository::class);
    }
}
