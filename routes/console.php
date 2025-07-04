<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    dd(fake()->randomElement(User::get()->pluck('id')->toArray()));
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
