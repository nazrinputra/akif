<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalityController;

Route::group(
    ['middleware' => ['auth', 'can:view_personalities']],
    function () {
        Route::resource('personalities', PersonalityController::class)->parameters([
            'personalities' => 'personality:slug'
        ]);

        Route::put('personalities/{personality:slug}/restore', [PersonalityController::class, 'restore'])
            ->name('personalities.restore');
    }
);
