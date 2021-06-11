<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommissionController;

Route::group(
    ['middleware' => ['auth', 'can:view commissions']],
    function () {
        Route::resource('commissions', CommissionController::class)->except('destroy');
    }
);
