<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;


Route::get('/', [MainController::class, 'home'])
->name('home');


Route::get('/movie/home', [MainController::class, 'movieHome'])
->name('movie.home');


Route::get('/movie/create', [MainController::class, 'movieCreate'])
->name('movie.create');


Route::post('/movie/store', [MainController::class, 'movieStore'])
->name('movie.store');


Route::get('/movie/delete/{movie}', [MainController::class, 'movieDelete'])
->name('movie.delete');


Route::get('/movie/edit/{movie}', [MainController::class, 'movieEdit'])
->name('movie.edit');


Route::post('/movie/save/{movie}', [MainController::class, 'movieSave'])
->name('movie.save');


use App\Http\Controllers\ApiController;

Route::get('/api/v1/movie/all', [ApiController::class, 'movieAll']);