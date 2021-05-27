<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {
        Route::resource('histories', HistoryController::class)->middleware('auth')->only('index', 'show');
    }
);
