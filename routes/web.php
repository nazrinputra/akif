<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
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
require __DIR__ . '/content/dashboard.php';
require __DIR__ . '/content/car.php';
require __DIR__ . '/content/crew.php';
require __DIR__ . '/content/customer.php';
require __DIR__ . '/content/package.php';
require __DIR__ . '/content/personality.php';
require __DIR__ . '/content/service.php';
require __DIR__ . '/content/whatsapp.php';
require __DIR__ . '/content/queue.php';

URL::forceScheme('https');

Route::get('/', function () {
    return Inertia::render('Public/Welcome');
})->name('welcome');

Route::resource('promotions', PromotionController::class)->parameters([
    'promotions' => 'package:slug'
])->only(['index', 'show']);

Route::get('store/{store:slug}', [StoreController::class, 'show'])->name('stores.show');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', function () {
        return Inertia::render('Private/Dashboard/Index');
    })->name('dashboard');

    Route::get('reports', function () {
        return Inertia::render('Private/Dashboard/Report');
    })->name('reports');

    Route::get('profiles', [ProfileController::class, 'show'])->name('profiles.show');

    Route::put('profiles', [ProfileController::class, 'update'])->name('profiles.update');
});
