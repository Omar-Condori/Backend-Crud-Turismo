<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SliderController;

Route::middleware('api')->group(function () {
    Route::get('/sliders', [SliderController::class, 'index']);
    Route::get('/sliders/{id}', [SliderController::class, 'show']);
    Route::post('/sliders', [SliderController::class, 'store']);
    Route::put('/sliders/{id}', [SliderController::class, 'update']);
    Route::delete('/sliders/{id}', [SliderController::class, 'destroy']);
});
