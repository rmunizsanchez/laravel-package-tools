<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('my-route', function () {
    return 'my response';
});

Route::get('execute-command', function () {
    Artisan::call('test-command');

    return Artisan::output();
});
