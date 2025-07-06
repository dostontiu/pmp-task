<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('task/store', [\Modules\Task\Controllers\TaskController::class, 'assign'])->name('task.assign');
    Route::post('task/{task}/status', [\Modules\Task\Controllers\TaskController::class, 'status'])->name('task.status');
});
