<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::resource('customers', CustomerController::class)->parameters([
    'customers' => 'customer:slug'
])->middleware('auth')->except('show');

Route::put('customers/{customer:slug}/restore', [CustomerController::class, 'restore'])
    ->name('customers.restore')->middleware('auth');