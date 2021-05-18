<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

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
    Route::get('dashboard', function () {
        return Inertia::render('Private/Dashboard');
    })->name('dashboard');

    Route::get('profile', [UserController::class, 'show'])->name('profile');

    Route::get('counter', function () {
        return Inertia::render('Private/Counter');
    })->name('counter');

    Route::get('whatsapp', function () {
        return Inertia::render('Private/Whatsapp');
    })->name('whatsapp');

    Route::get('cars', [CarController::class, 'index'])->name('cars');

    Route::get('cars/{car:plate_no}', [CarController::class, 'show'])->name('car');

    Route::get('customers', [CustomerController::class, 'index'])->name('customers');

    Route::get('customer/{customer:slug}', [CustomerController::class, 'show'])->name('customer');

    Route::get('services', [ServiceController::class, 'index'])->name('services');

    Route::get('services/{service:slug}', [ServiceController::class, 'show'])->name('service');
});

require __DIR__ . '/auth.php';
