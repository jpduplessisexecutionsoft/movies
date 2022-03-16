<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\showingController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::resource('movie', MovieController::class)->middleware('auth');
Route::resource('booking', BookingController::class)->middleware('auth');
Route::resource('showing', showingController::class)->middleware('auth');
