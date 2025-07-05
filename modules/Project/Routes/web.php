<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('project', \Modules\Project\Controllers\ProjectController::class);
});
