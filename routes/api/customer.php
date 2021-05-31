<?php

use App\Models\Car;
use App\Models\Customer;
use App\Models\Personality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PersonalityController;

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

Route::get('customers/search', [CustomerController::class, 'search'])
    ->name('customers.search');

Route::get('cars/search', [CarController::class, 'search'])
    ->name('cars.search');

Route::get('personalities/search', [PersonalityController::class, 'search'])
    ->name('personalities.search');

Route::post('owner/link', function (Request $request) {
    $customer = Customer::find($request->customer_id);
    $car = Car::find($request->car_id);
    $car->owners()->save($customer);
    return Redirect::back();
})->name('owner.link');

Route::post('owner/unlink', function (Request $request) {
    $customer = Customer::find($request->customer_id);
    $car = Car::find($request->car_id);
    $car->owners()->detach($customer);
    return Redirect::back();
})->name('owner.unlink');

Route::post('personality/link', function (Request $request) {
    $customer = Customer::find($request->customer_id);
    $personality = Personality::find($request->personality_id);
    $customer->personalities()->save($personality);
    return Redirect::back();
})->name('personality.link');

Route::post('personality/unlink', function (Request $request) {
    $customer = Customer::find($request->customer_id);
    $personality = personality::find($request->personality_id);
    $customer->personalities()->detach($personality);
    return Redirect::back();
})->name('personality.unlink');
