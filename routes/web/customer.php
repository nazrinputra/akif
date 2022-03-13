<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::group(
    ['middleware' => ['auth', 'can:view customers']],
    function () {
        Route::resource('customers', CustomerController::class)->parameters([
            'customers' => 'customer:id'
        ]);

        Route::put('customers/{customer:id}/restore', [CustomerController::class, 'restore'])
            ->name('customers.restore');
    }
);
