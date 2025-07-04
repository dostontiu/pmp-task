<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth');

Route::get('login', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.store');
Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('project', [\App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
    Route::post('project/store', [\App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
    Route::get('project/{project}/edit', [\App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
    Route::post('project/{project}/update', [\App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
    Route::post('project/{project}/destroy', [\App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');
});
