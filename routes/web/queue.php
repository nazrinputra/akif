<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;

Route::group(
    ['middleware' => ['auth', 'permission:view_queues|create_queues|edit_queues|reopen_queues']],
    function () {
        Route::get('queues/manage', [QueueController::class, 'manage'])
            ->name('queues.manage');

        Route::resource('queues', QueueController::class)->except('create', 'destroy');
    }
);
