<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

Route::get('/', [ResumeController::class, 'index']);
Route::post('/download', [ResumeController::class, 'download']);

