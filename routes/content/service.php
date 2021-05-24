<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::resource('services', ServiceController::class)->parameters([
    'services' => 'service:slug'
])->middleware('auth')->except('show');

Route::put('services/{service:slug}/restore', [ServiceController::class, 'restore'])
    ->name('services.restore')->middleware('auth');
