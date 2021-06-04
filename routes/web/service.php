<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::group(
    ['middleware' => ['auth', 'can:view services']],
    function () {
        Route::resource('services', ServiceController::class)->parameters([
            'services' => 'service:slug'
        ]);

        Route::put('services/{service:slug}/restore', [ServiceController::class, 'restore'])
            ->name('services.restore');
    }
);
