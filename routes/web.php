<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;

Route::get('/survey', [SurveyController::class, 'showSurveyForm'])->name('survey.form');
Route::post('/survey', [SurveyController::class, 'submitSurveyForm'])->name('survey.submit');
Route::get('/generated-token', [SurveyController::class, 'showGeneratedToken'])->name('generated.token');
