<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('counter', function () {
        return Inertia::render('Private/Dashboard/Counter');
    })->name('counter');

    Route::get('owner', function () {
        return Inertia::render('Private/Dashboard/Owner');
    })->name('owner');

    Route::get('promotion', function () {
        return Inertia::render('Private/Dashboard/Promotion');
    })->name('promotion');

    Route::get('personality', function () {
        return Inertia::render('Private/Dashboard/Personality');
    })->name('personality');
});
