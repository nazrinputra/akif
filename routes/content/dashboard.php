<?php

use App\Models\Car;
use Inertia\Inertia;
use App\Models\Package;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('counter', function () {
        return Inertia::render('Private/Dashboard/Counter', [
            'cars' => Car::select('*')->orderBy('model')->get(),
            'packages' => Package::select('*')->orderBy('name')->get(),
        ]);
    })->name('counter');
});
