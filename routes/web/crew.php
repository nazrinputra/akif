<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group(
    ['middleware' => ['auth', 'permission:view_crews|create_crews|edit_crews|reopen_crews']],
    function () {
        Route::resource('crews', UserController::class)->parameters([
            'crews' => 'crew:slug'
        ]);

        Route::put('crews/{crew:slug}/restore', [UserController::class, 'restore'])
            ->name('crews.restore');
    }
);
