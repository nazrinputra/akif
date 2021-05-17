<?php

use App\Http\Controllers\CarController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Public/Welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Private/Dashboard');
    })->name('dashboard');

    Route::get('/counter', function () {
        return Inertia::render('Private/Counter');
    })->name('counter');

    Route::get('/whatsapp', function () {
        return Inertia::render('Private/Whatsapp');
    })->name('whatsapp');

    Route::get('/cars', [CarController::class, 'index'])->name('cars');
});

require __DIR__ . '/auth.php';
