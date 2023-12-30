<?php

use App\Http\Controllers\Student\AnswerController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('student')->middleware(['auth','is_student'])->group(function () {
    Route::get('exams',[AnswerController::class,'exams'])->name('student.exams');
    Route::get('my/answer/{id}',[AnswerController::class,'index'])->name('student.exam.question');
    Route::post('exam/question/my/answer/{id}',[AnswerController::class,'store'])->name('student.exam.question.answer');
    Route::get('my/exam/result/{id}',[AnswerController::class,'examResultDetail'])->name('student.exam.result');
});

require __DIR__.'/auth.php';
