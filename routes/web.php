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
    return view('public.welcome');
})->name('welcome');

Route::get('store/{store:slug}', 'StoreController@show')->name('store');

Route::get('promotions', function () {
    return view('public.promotions');
})->name('promotions');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/index', 'HomeController@index')->name('index');

Route::group(['middleware' => ['auth', 'clear.cache']], function () {

    Route::get('counter', function () {
        return view('private.counter');
    })->name('counter');

    Route::get('whatsapp', function () {
        return view('private.whatsapp');
    })->name('whatsapp');

    Route::get('cars', 'CarController@index')->name('cars');

    Route::get('cars/{car:plate_no}', 'CarController@show')->name('car');

    Route::get('customers', 'CustomerController@index')->name('customers');

    Route::get('customers/{customer:slug}', 'CustomerController@show')->name('customer');

    Route::get('services', function () {
        return view('private.services');
    })->name('services');

    Route::get('services/service', function () {
        return view('private.service');
    })->name('service');

    Route::get('packages', function () {
        return view('private.packages');
    })->name('packages');

    Route::get('packages/package', function () {
        return view('private.package');
    })->name('package');

    Route::get('dashboard', function () {
        return view('private.dashboard');
    })->name('dashboard');

    Route::get('crews', function () {
        return view('private.crews');
    })->name('crews');

    Route::get('crews/crew', function () {
        return view('private.crew');
    })->name('crew');
});
