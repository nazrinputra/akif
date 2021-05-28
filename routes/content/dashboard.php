<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('counter', function () {
        return Inertia::render('Private/Dashboard/Counter');
    })->name('counter');
});
