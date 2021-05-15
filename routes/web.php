<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

URL::forceScheme('https');

Route::get('/', function () {
    return view('welcome');
});

Route::get('store/{store:slug}', 'StoreController@show')->name('store');

Route::get('whatsapp', function () {
    return view('dashboard.whatsapp');
});

Route::get('cars', 'CarController@index')->name('cars');

Route::get('car/{car:plate_no}', 'CarController@show')->name('car');

Route::get('counter', function () {
    return view('dashboard.counter');
});

Route::get('customers', function () {
    return view('dashboard.customers');
});

Route::get('customer', function () {
    return view('dashboard.customer');
});

Route::get('services', function () {
    return view('dashboard.services');
});

Route::get('service', function () {
    return view('dashboard.service');
});

Route::get('packages', function () {
    return view('dashboard.packages');
});

Route::get('package', function () {
    return view('dashboard.package');
});

Route::get('dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('crews', function () {
    return view('dashboard.crews');
});

Route::get('crew', function () {
    return view('dashboard.crew');
});

// Route::get('services', function () {
//     return view('service-static');
// });

// Route::get('service', function () {
//     return view('service-static');
// });

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
