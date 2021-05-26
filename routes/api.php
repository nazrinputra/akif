<?php

use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\QueueController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('store/{store:slug}/queues', [QueueController::class, 'index'])->name('queues.index');

Route::get('cars/search', [CarController::class, 'search'])
    ->name('cars.search');

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

    return Redirect::route('customers.show', $customer)->with('success', 'Owner linked successfully. <a href="' . route('cars.show', $car) . '"style="color:#fff;text-decoration:underline;">View car</a> or <a href="' . route('customers.show', $customer) . '"style="color:#fff;text-decoration:underline;">view customer</a>');
})->name('owner.link');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
