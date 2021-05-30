<?php

use App\Models\Car;
use App\Models\Package;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Personality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ServiceController;
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

URL::forceScheme('https');

Route::get('store/{store:slug}/queues', [QueueController::class, 'search'])->name('queues.search');

Route::get('cars/search', [CarController::class, 'search'])
    ->name('cars.search');

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

Route::get('customers/search', [CustomerController::class, 'search'])
    ->name('customers.search');

Route::get('personalities/search', [PersonalityController::class, 'search'])
    ->name('personalities.search');

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

Route::get('services/search', [ServiceController::class, 'search'])
    ->name('services.search');

Route::post('package/link', function (Request $request) {
    $service = Service::find($request->service_id);
    $package = Package::find($request->package_id);
    $service->packages()->save($package);
    return Redirect::back();
})->name('package.link');

Route::post('package/unlink', function (Request $request) {
    $service = Service::find($request->service_id);
    $package = Package::find($request->package_id);
    $service->packages()->detach($package);
    return Redirect::back();
})->name('package.unlink');

Route::get('packages/search', [PackageController::class, 'search'])
    ->name('packages.search');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
