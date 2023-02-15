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