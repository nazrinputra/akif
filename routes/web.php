<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('store/{store}', 'StoreController@show');

Route::get('counter', function () {
    return view('counter');
});

Route::get('tambak-bugis', function () {
    return view('tambak-bugis');
});

Route::get('bukit-katil', function () {
    return view('bukit-katil');
});

Route::get('service', function () {
    return view('service-static');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
