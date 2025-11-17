<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = \App\Models\User::firstOrFail();

    \App\Jobs\UserRegisterJob::dispatch($user, 'jobs')->onQueue('jobs');
    \App\Jobs\UserRegisterJob::dispatch($user, 'default')->onQueue('default');

    return $user;
});
