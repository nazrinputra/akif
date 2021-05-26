<?php

use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('counter', function () {
        return Inertia::render('Private/Dashboard/Counter', [
            'cars' => DB::table('cars')->orderBy('plate_no', 'asc')->get(),
            'packages' => DB::table('packages')->orderBy('name', 'asc')->get(),
        ]);
    })->name('counter');

    Route::get('owner', function () {
        return Inertia::render('Private/Dashboard/Owner', [
            'cars' => DB::table('cars')->orderBy('plate_no', 'asc')->get(),
            'customers' => DB::table('customers')->orderBy('name', 'asc')->get()
        ]);
    })->name('owner');

    Route::post('owner', function (Request $request) {
        dd($request);
    })->name('owner.store');

    Route::get('promotion', function () {
        return Inertia::render('Private/Dashboard/Promotion', [
            'services' => DB::table('services')->orderBy('name', 'asc')->get(),
            'packages' => DB::table('packages')->orderBy('name', 'asc')->get(),
        ]);
    })->name('promotion');

    Route::get('personality', function () {
        return Inertia::render('Private/Dashboard/Personality', [
            'customers' => DB::table('customers')->orderBy('name', 'asc')->get(),
            'personalities' => DB::table('personalities')->orderBy('name', 'asc')->get(),
        ]);
    })->name('personality');

    Route::post('personality', function (Request $request) {
        dd($request);
    })->name('personality.store');
});
