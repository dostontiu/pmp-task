<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('task/{task}/store', [\Modules\Task\Controllers\TaskController::class, 'store'])->name('task.store');
    Route::post('task/{task}/update', [\Modules\Task\Controllers\TaskController::class, 'update'])->name('task.update');
    Route::post('task/{task}/destroy', [\Modules\Task\Controllers\TaskController::class, 'destroy'])->name('task.destroy');
});
