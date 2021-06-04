<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;

Route::group(
    ['middleware' => ['auth', 'can:view healths']],
    function () {
        Route::get('healths/manage', [HealthController::class, 'manage'])
            ->name('healths.manage');

        Route::resource('healths', HealthController::class)->except('create', 'destroy');
    }
);
