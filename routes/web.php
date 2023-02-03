<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveysController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\QuestionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::resource('surveys', SurveysController::class);
// Route::resource('surveys.questions', QuestionsController::class);
// Route::resource('surveys.questions.options', OptionsController::class);


Route::get('/index', [SurveysController::class, 'index'])->name('survey.index');
Route::get('/survey/show/{survey}', [SurveysController::class, 'show'])->name('survey.show');
Route::get('/survey/create', [SurveysController::class, 'create'])->name('survey.create');
Route::post('/index', [SurveysController::class, 'store'])->name('survey.store');
Route::get('/survey/edit/{survey}', [SurveysController::class, 'edit'])->name('survey.edit');
Route::put('/survey/{survey}', [SurveysController::class, 'update'])->name('survey.update');
Route::delete('/survey/{survey}', [SurveysController::class, 'destroy'])->name('survey.destroy');

Route::get('/survey/questions/{survey}', [QuestionsController::class, 'index'])->name('survey.question.index');
Route::get('/survey/question-create/{survey}', [QuestionsController::class, 'create'])->name('survey.question.create');
Route::post('/survey/questions/{survey}', [QuestionsController::class, 'store'])->name('survey.question.store');
Route::get('/survey/question-edit/{survey}/{question}', [QuestionsController::class, 'edit'])->name('survey.question.edit');
Route::put('/survey/question/{survey}/{question}', [QuestionsController::class, 'update'])->name('survey.question.update');
Route::delete('/survey/question/{survey}/{question}', [QuestionsController::class, 'destroy'])->name('survey.question.destroy');

Route::get('/survey/question-option/{survey}/{question}', [OptionsController::class, 'index'])->name('survey.question.option.index');
Route::get('/survey/question-option-create/{survey}/{question}', [OptionsController::class, 'create'])->name('survey.question.option.create');
Route::post('/survey/question-option/{survey}/{question}', [OptionsController::class, 'store'])->name('survey.question.option.store');
Route::get('/survey/question-option-edit/{survey}/{question}/{option}', [OptionsController::class, 'edit'])->name('survey.question.option.edit');
Route::put('/survey/question-option/{survey}/{question}/{option}', [OptionsController::class, 'update'])->name('survey.question.option.update');
Route::delete('/survey/question-option/{survey}/{question}/{option}', [OptionsController::class, 'destroy'])->name('survey.question.option.destroy');



