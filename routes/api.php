<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SurveysController;
use App\Http\Controllers\Api\QuestionsController;
use App\Http\Controllers\Api\OptionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::get('/survey/{survey}', [SurveysController::class, 'index']);
    Route::get('/survey-questions/{survey}', [QuestionsController::class, 'index']);
    Route::get('/survey-questions-options/{survey}/{question}', [OptionsController::class, 'index']);
});