<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','is_admin'])->group(function () {
        Route::get('dashboard', [StudentController::class, 'index'])->name('dashboard');
        Route::get('student/add', [StudentController::class, 'create'])->name('student.add');
        Route::post('student/add', [StudentController::class, 'store'])->name('student.store');
        Route::get('student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
        Route::put('student/{id}/edit',[StudentController::class,'update'])->name('student.update');
        Route::delete('student/{id}/destroy', [StudentController::class, 'destroy'])->name('student.destroy');


        Route::get('exams', [ExamController::class, 'index'])->name('exams');
        Route::get('exam/add', [ExamController::class, 'create'])->name('exam.add');
        Route::post('exam/add', [ExamController::class, 'store'])->name('exam.store');
        Route::get('exam/{id}/edit', [ExamController::class, 'edit'])->name('exam.edit');
        Route::put('exam/{id}/edit',[ExamController::class,'update'])->name('exam.update');
        Route::delete('exam/{id}/destroy', [ExamController::class, 'destroy'])->name('exam.destroy');
        Route::post('/exam/status',[ExamController::class,'status'])->name("exam.status");
        Route::get('exam/questions/{id}',[ExamController::class,'show'])->name('exam.questions');
        Route::get('/assign-questions', [ExamController::class, 'assignQuestions'])->name('assign.questions');

        Route::get('question/add/{id}',[QuestionController::class,'create'])->name('question.add');
        Route::post('question/add',[QuestionController::class,'store'])->name('question.store');
        Route::delete('question/{id}/destroy', [QuestionController::class, 'destroy'])->name('question.destroy');
        Route::get('question/{id}/edit', [QuestionController::class, 'edit'])->name('question.edit');
        Route::put('question/{id}/edit',[QuestionController::class,'update'])->name('question.update');

        Route::get('exam/result',[StudentController::class,'examResults'])->name('examResults');
        Route::get('exam/result/add',[StudentController::class,'examResultCreate'])->name('examResult.add');
        Route::post('exam/result/add',[StudentController::class,'examResultStore'])->name('examResult.store');
        Route::get('exam/result/{id}/edit', [StudentController::class, 'examResultEdit'])->name('examResult.edit');
        Route::put('exam/result/{id}/edit',[StudentController::class,'examResultUpdate'])->name('examResult.update');
        Route::delete('exam/result/{id}/destroy', [StudentController::class, 'examResultDestroy'])->name('examResult.destroy');


        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
