<?php

use App\Models\Car;
use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('owner', function () {
        return Inertia::render('Private/Dashboard/Owner', [
            'cars' => Car::select('*')->orderBy('model')->get(),
            'customers' => Customer::select('*')->orderBy('name')->get(),
        ]);
    })->name('owner');

    Route::post('owner', function (Request $request) {
        $customer = Customer::find($request->customer_id);
        $car = Car::find($request->car_id);

        if ($customer->cars->contains($car)) {
            return Redirect::back()->with(
                'error',
                'Link already exist! <a href="' . route('customers.show', $customer) . '"style="color:#fff;text-decoration:underline;">View customer</a> or <a href="' . route('cars.show', $car) . '"style="color:#fff;text-decoration:underline;">view car</a>'
            );
        }

        $car->owners()->save($customer);

        return Redirect::back()->with('success', 'Owner linked successfully. <a href="' . route('cars.show', $car) . '"style="color:#fff;text-decoration:underline;">View car</a> or <a href="' . route('customers.show', $customer) . '"style="color:#fff;text-decoration:underline;">view customer</a>');
    })->name('owner.store');
});
