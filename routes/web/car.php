<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {
        Route::resource('cars', CarController::class)->parameters([
            'cars' => 'car:slug'
        ]);

        Route::put('cars/{car:slug}/restore', [CarController::class, 'restore'])
            ->name('cars.restore');
    }
);