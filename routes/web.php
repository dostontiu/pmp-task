<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('home')->middleware('auth');
Route::redirect('/', 'project')->name('home')->middleware('auth');
