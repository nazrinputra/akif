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
use App\Http\Controllers\PersonalityController;
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

Route::resource('promotions', PromotionController::class)->parameters([
    'promotions' => 'package:slug'
])->only(['index', 'show']);

Route::get('store/{store:slug}', [StoreController::class, 'show'])->name('store');


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', function () {
        return Inertia::render('Private/Dashboard');
    })->name('dashboard');

    Route::get('reports', function () {
        return Inertia::render('Private/Report');
    })->name('reports');

    Route::get('profile', function () {
        return Inertia::render('Private/Profile', [
            'user' => Auth::user()->load('store')
        ]);
    })->name('profile');

    Route::get('counter', function () {
        return Inertia::render('Private/Counter');
    })->name('counter');

    Route::resource('whatsapps', WhatsappController::class)->parameters([
        'whatsapps' => 'whatsapp:slug'
    ])->only(['index', 'show']);

    Route::resource('cars', CarController::class)->parameters([
        'cars' => 'car:slug'
    ])->only(['index', 'show']);

    Route::resource('customers', CustomerController::class)->parameters([
        'customers' => 'customer:slug'
    ])->only(['index', 'show']);

    Route::resource('services', ServiceController::class)->parameters([
        'services' => 'service:slug'
    ])->only(['index', 'show']);

    Route::resource('packages', PackageController::class)->parameters([
        'packages' => 'package:slug'
    ])->only(['index', 'show']);

    Route::resource('personalities', PersonalityController::class)->parameters([
        'personalities' => 'personality:slug'
    ])->only(['index', 'show']);

    Route::resource('crews', UserController::class)->parameters([
        'crews' => 'crew:slug'
    ])->only(['index', 'show']);
});

require __DIR__ . '/auth.php';
