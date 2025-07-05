<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth');

Route::get('login', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.store');
Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::post('task/{task}/store', [\App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
    Route::post('task/{task}/update', [\App\Http\Controllers\TaskController::class, 'update'])->name('task.update');
    Route::post('task/{task}/destroy', [\App\Http\Controllers\TaskController::class, 'destroy'])->name('task.destroy');
});
