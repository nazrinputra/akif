<?php

use App\Models\Car;
use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('counter', function () {
        return Inertia::render('Private/Dashboard/Counter', [
            'cars' => DB::table('cars')->orderBy('plate_no', 'asc')->get(),
            'packages' => DB::table('packages')->orderBy('name', 'asc')->get(),
        ]);
    })->name('counter');

    Route::get('owner', function () {
        return Inertia::render('Private/Dashboard/Owner', [
            'cars' => Car::select('*')->orderBy('model')->get(),
            'customers' => Customer::select('*')->orderBy('name')->get(),
        ]);
    })->name('owner');

    Route::post('owner', function (Request $request) {
        $customer = Customer::find($request->customer_id);
        $car = Car::find($request->car_id);
        $car->owners()->save($customer);

        return Redirect::back()->with('success', 'Owner linked successfully. <a href="' . route('cars.show', $car) . '"style="color:#fff;text-decoration:underline;">View car</a> or <a href="' . route('customers.show', $customer) . '"style="color:#fff;text-decoration:underline;">view customer</a>');
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
