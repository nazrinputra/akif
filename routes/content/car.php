<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::resource('cars', CarController::class)->parameters([
    'cars' => 'car:slug'
])->middleware('auth');

Route::put('cars/{car:slug}/restore', [CarController::class, 'restore'])
    ->name('cars.restore')->middleware('auth');
