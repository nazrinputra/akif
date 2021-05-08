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

Route::get('tambak-bugis', function () {
    return view('store',[
        'slug' => 'tambak-bugis',
        'name' => 'Tambak Bugis'
    ]);
});

Route::get('bukit-katil', function () {
    return view('store',[
        'slug' => 'bukit-katil',
        'name' => 'Bukit Katil'
    ]);
});