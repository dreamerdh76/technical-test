<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\KeywordController;


Route::prefix('v1')->group(function () {
    // Tareas
    Route::get   ('tasks',        [TaskController::class, 'index']);
    Route::post  ('tasks',        [TaskController::class, 'store']);
    Route::patch ('tasks/{id}/toggle', [TaskController::class, 'toggle']);

    // Keywords (opcional)
    Route::get   ('keywords',     [KeywordController::class, 'index']);
    Route::post  ('keywords',     [KeywordController::class, 'store']);
});
