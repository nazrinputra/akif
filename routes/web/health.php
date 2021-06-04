<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;

Route::group(
    ['middleware' => ['auth', 'can:view healths']],
    function () {
        Route::resource('healths', HealthController::class)->parameters([
            'healths' => 'health:slug'
        ]);

        Route::put('healths/{health:slug}/restore', [HealthController::class, 'restore'])
            ->name('healths.restore');
    }
);
