<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resource('crews', UserController::class)->parameters([
    'crews' => 'crew:slug'
])->middleware('auth')->except('show');

Route::put('crews/{crew:slug}/restore', [UserController::class, 'restore'])
    ->name('crews.restore')->middleware('auth');
