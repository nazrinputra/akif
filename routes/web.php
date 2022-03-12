<?php

use Inertia\Inertia;
use App\Models\Queue;
use App\Models\Store;
use App\Models\Customer;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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
require __DIR__ . '/web/health.php';

URL::forceScheme('https'); // FIXME might not need this?

Route::get('/', function () {
    return Inertia::render('Public/Welcome');
})->name('welcome');

Route::resource('promotions', PromotionController::class)->parameters([
    'promotions' => 'package:slug'
])->only(['index', 'show']);

Route::get('store/{store:slug}', [StoreController::class, 'show'])->name('stores.show');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('monthly', [DashboardController::class, 'monthly'])->name('monthly')->middleware(['can:view queues']);

    Route::get('fresh', [DashboardController::class, 'fresh'])->name('fresh')->middleware(['can:view customers']);

    Route::get('stale', [DashboardController::class, 'stale'])->name('stale')->middleware(['can:view customers']);

    Route::get('counter', [QueueController::class, 'create'])->name('counter')->middleware(['can:create queues']);

    Route::get('profiles', [ProfileController::class, 'show'])->name('profiles.show');

    Route::put('profiles', [ProfileController::class, 'update'])->name('profiles.update');
});
