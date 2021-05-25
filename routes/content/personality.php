<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalityController;

Route::resource('personalities', PersonalityController::class)->parameters([
    'personalities' => 'personality:slug'
])->middleware('auth');

Route::put('personalities/{personality:slug}/restore', [PersonalityController::class, 'restore'])
    ->name('personalities.restore')->middleware('auth');
