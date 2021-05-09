<?php

use App\Models\Store;
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
    return view('home', [
        'stores' => Store::all()
    ]);
});

Route::get('store/{store:slug}', function (Store $store) {
    return view('store', [
        'store' => $store
    ]);
});

Route::get('service', function () {
    return view('service');
});