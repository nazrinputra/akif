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
    return view('home');
});

Route::get('service', function () {
    return view('service');
});

//TODO setup fallback if random path is given
Route::get('{store}', function ($store) {
    return view('store', [
        'slug' => $store,
        'name' => str_replace('-', ' ', $store)
    ]);
});