<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;

Route::group(
    ['middleware' => ['auth', 'can:view_packages']],
    function () {
        Route::resource('packages', PackageController::class)->parameters([
            'packages' => 'package:slug'
        ]);

        Route::put('packages/{package:slug}/restore', [PackageController::class, 'restore'])
            ->name('packages.restore');
    }
);
