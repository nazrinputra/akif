<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {
        Route::resource('roles', RoleController::class)->parameters([
            'roles' => 'role:slug'
        ]);

        Route::put('roles/{role:slug}/restore', [RoleController::class, 'restore'])
            ->name('roles.restore');
    }
);
