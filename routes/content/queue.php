<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {
        Route::resource('queues', QueueController::class)->middleware('auth')->only('index', 'store', 'show');
    }
);
