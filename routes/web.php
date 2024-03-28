<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    session()->forget('google_access_token');

    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
