<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth');

Route::get('login', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.store');
