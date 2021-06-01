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
require __DIR__ . '/web/car.php';
require __DIR__ . '/web/crew.php';
require __DIR__ . '/web/customer.php';
require __DIR__ . '/web/package.php';
require __DIR__ . '/web/personality.php';
require __DIR__ . '/web/service.php';
require __DIR__ . '/web/whatsapp.php';
require __DIR__ . '/web/queue.php';
require __DIR__ . '/web/role.php';

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

    Route::get('counter', function () {
        return Inertia::render('Private/Dashboard/Counter');
    })->name('counter')->middleware(['can:create_queues']);;

    Route::get('reports', function () {
        return Inertia::render('Private/Dashboard/Report');
    })->name('reports');

    Route::get('profiles', [ProfileController::class, 'show'])->name('profiles.show');

    Route::put('profiles', [ProfileController::class, 'update'])->name('profiles.update');
});
