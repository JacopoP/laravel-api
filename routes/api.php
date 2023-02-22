<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\ApiController;

Route::get('/v1/all', [ApiController::class, 'getAll']);

Route::get('/v1/movie/all', [ApiController::class, 'movieAll']);

Route::post('/v1/movie/store', [ApiController::class, 'movieStore']);
