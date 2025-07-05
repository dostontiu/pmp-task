<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    Route::get('login', [\Modules\User\Controllers\AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [\Modules\User\Controllers\AuthController::class, 'login'])->name('login.store');
    Route::post('logout', [\Modules\User\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');
});
