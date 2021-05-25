<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {
        Route::resource('crews', UserController::class)->parameters([
            'crews' => 'crew:slug'
        ])->middleware('auth');

        Route::put('crews/{crew:slug}/restore', [UserController::class, 'restore'])
            ->name('crews.restore')->middleware('auth');
    }
);
