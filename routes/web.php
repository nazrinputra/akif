<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\WhatsappController;

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
    return Inertia::render('Public/Welcome');
})->name('welcome');

Route::get('promotions', [PromotionController::class, 'index'])->name('promotions');

Route::get('promotion/{package:slug}', [PromotionController::class, 'show'])->name('promotion');

Route::get('store/{store:slug}', [StoreController::class, 'show'])->name('store');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', function () {
        return Inertia::render('Private/Dashboard');
    })->name('dashboard');

    Route::get('profile', function () {
        return Inertia::render('Private/Profile', [
            'user' => Auth::user()->load('store')
        ]);
    })->name('profile');

    Route::get('counter', function () {
        return Inertia::render('Private/Counter');
    })->name('counter');

    Route::get('whatsapps', [WhatsappController::class, 'index'])->name('whatsapps');

    Route::get('whatsapp/{whatsapp:slug}', [WhatsappController::class, 'show'])->name('whatsapp');

    Route::get('cars', [CarController::class, 'index'])->name('cars');

    Route::get('cars/{car:plate_no}', [CarController::class, 'show'])->name('car');

    Route::get('customers', [CustomerController::class, 'index'])->name('customers');

    Route::get('customer/{customer:slug}', [CustomerController::class, 'show'])->name('customer');

    Route::get('services', [ServiceController::class, 'index'])->name('services');

    Route::get('services/{service:slug}', [ServiceController::class, 'show'])->name('service');

    Route::get('packages', [PackageController::class, 'index'])->name('packages');

    Route::get('packages/{package:slug}', [PackageController::class, 'show'])->name('package');

    Route::get('reports', function () {
        return Inertia::render('Private/Report');
    })->name('reports');

    Route::get('crews', [UserController::class, 'index'])->name('crews');

    Route::get('crews/{user:slug}', [UserController::class, 'show'])->name('crew');
});

require __DIR__ . '/auth.php';
