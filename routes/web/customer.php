<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {
        Route::resource('customers', CustomerController::class)->parameters([
            'customers' => 'customer:slug'
        ]);

        Route::put('customers/{customer:slug}/restore', [CustomerController::class, 'restore'])
            ->name('customers.restore');
    }
);
