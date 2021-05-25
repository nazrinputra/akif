<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;

Route::resource('packages', PackageController::class)->parameters([
    'packages' => 'package:slug'
])->middleware('auth');

Route::put('packages/{package:slug}/restore', [PackageController::class, 'restore'])
    ->name('packages.restore')->middleware('auth');
