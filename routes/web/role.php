<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::group(
    ['middleware' => ['auth', 'permission:view_roles|create_roles|edit_roles|reopen_roles']],
    function () {
        Route::resource('roles', RoleController::class);

        Route::put('roles/{role}/restore', [RoleController::class, 'restore'])
            ->name('roles.restore');
    }
);
