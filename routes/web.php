<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PromotionController;

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

require __DIR__ . '/auth.php';
require __DIR__ . '/content/car.php';
require __DIR__ . '/content/crew.php';
require __DIR__ . '/content/customer.php';
require __DIR__ . '/content/package.php';
require __DIR__ . '/content/personality.php';
require __DIR__ . '/content/service.php';
require __DIR__ . '/content/whatsapp.php';

URL::forceScheme('https');

Route::get('/', function () {
    return Inertia::render('Public/Welcome');
})->name('welcome');

Route::resource('promotions', PromotionController::class)->parameters([
    'promotions' => 'package:slug'
])->only(['index', 'show']);

Route::get('store/{store:slug}', [StoreController::class, 'show'])->name('store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', function () {
        return Inertia::render('Private/Dashboard/Index');
    })->name('dashboard');

    Route::get('counter', function () {
        return Inertia::render('Private/Dashboard/Counter');
    })->name('counter');

    Route::get('profile', function () {
        return Inertia::render('Private/Dashboard/Profile', [
            'user' => Auth::user()->load('store')
        ]);
    })->name('profile');

    Route::get('reports', function () {
        return Inertia::render('Private/Dashboard/Report');
    })->name('reports');
});
