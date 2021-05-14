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

Route::get('counter', function () {
    return view('counter-static');
});

Route::get('services', function () {
    return view('service-static');
});

Route::get('service', function () {
    return view('service-static');
});

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
