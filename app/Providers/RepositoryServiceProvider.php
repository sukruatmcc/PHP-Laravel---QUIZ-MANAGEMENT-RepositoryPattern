<?php

namespace App\Providers;

use App\Interfaces\IAnswerRepositoryInterface;
use App\Interfaces\IExamRepositoryInterface;
use App\Interfaces\IStudentRepositoryInterface;
use App\Interfaces\IQuestionRepositoryInterface;
use App\Repositories\AnswerRepository;
use App\Repositories\ExamRepository;
use App\Repositories\QuestionRepository;
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
        $this->app->bind(IQuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(IAnswerRepositoryInterface::class, AnswerRepository::class);
    }
}
