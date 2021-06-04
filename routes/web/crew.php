<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group(
    ['middleware' => ['auth', 'can:view crews']],
    function () {
        Route::resource('crews', UserController::class)->parameters([
            'crews' => 'crew:slug'
        ]);

        Route::put('crews/{crew:slug}/restore', [UserController::class, 'restore'])
            ->name('crews.restore');
    }
);
