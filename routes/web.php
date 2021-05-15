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
})->name('welcome');

Route::get('store/{store:slug}', 'StoreController@show')->name('store');

Route::get('counter', function () {
    return view('menu.counter');
})->name('counter');

Route::get('whatsapp', function () {
    return view('menu.whatsapp');
})->name('whatsapp');

Route::get('cars', 'CarController@index')->name('cars');

Route::get('cars/{car:plate_no}', 'CarController@show')->name('car');

Route::get('customers', function () {
    return view('menu.customers');
})->name('customers');

Route::get('customers/customer', function () {
    return view('menu.customer');
})->name('customer');

Route::get('services', function () {
    return view('menu.services');
})->name('services');

Route::get('services/service', function () {
    return view('menu.service');
})->name('service');

Route::get('packages', function () {
    return view('menu.packages');
})->name('packages');

Route::get('packages/package', function () {
    return view('menu.package');
})->name('package');

Route::get('dashboard', function () {
    return view('menu.dashboard');
})->name('dashboard');

Route::get('crews', function () {
    return view('menu.crews');
})->name('crews');

Route::get('crews/crew', function () {
    return view('menu.crew');
})->name('crew');

Route::get('promotions', function () {
    return view('service-static');
})->name('promotions');

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
