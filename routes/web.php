<?php

use Inertia\Inertia;
use App\Models\Queue;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', function () {
        $customers = Customer::all()->count();
        $monthly = Queue::whereDate('created_at', '>', now()->subDays(30))->distinct()->pluck('car_id')->count();
        $fresh = Customer::whereDate('created_at', '>', now()->subDays(30))->count();
        $new = Customer::whereDate('created_at', '>', now()->subDays(60))->pluck('id')->toArray();
        $stale = Queue::whereDate('created_at', '<', now()->subDays(60))->whereNotIn('customer_id', $new)->count();

        return Inertia::render('Private/Dashboard/Index', [
            'customers' => $customers,
            'monthly' => $monthly,
            'fresh' => $fresh,
            'stale' => $stale
        ]);
    })->name('dashboard');

    Route::get('monthly', function () {
        $queues = Queue::where('created_at', '>', now()->subDays(30))->with('car')->paginate(10)->withQueryString();

        return Inertia::render('Private/Dashboard/Monthly', [
            'queues' => $queues
        ]);
    })->name('monthly')->middleware(['permission:view_queues|create_queues|edit_queues|reopen_queues']);

    Route::get('fresh', function () {
        $customers = Customer::whereDate('created_at', '>', now()->subDays(30))->paginate(10)->withQueryString();

        return Inertia::render('Private/Dashboard/Fresh', [
            'customers' => $customers
        ]);
    })->name('fresh')->middleware(['permission:view_customers|create_customers|edit_customers']);

    Route::get('stale', function () {
        $new = Customer::whereDate('created_at', '>', now()->subDays(60))->pluck('id')->toArray();
        $stale = Queue::whereDate('created_at', '<', now()->subDays(60))->whereNotIn('customer_id', $new)->pluck('id')->toArray();
        $customers = Customer::whereIn('id', $stale)->paginate(10)->withQueryString();

        return Inertia::render('Private/Dashboard/Stale', [
            'customers' => $customers
        ]);
    })->name('stale')->middleware(['permission:view_customers|create_customers|edit_customers']);

    Route::get('counter', function () {
        return Inertia::render('Private/Dashboard/Counter');
    })->name('counter')->middleware(['can:create_queues']);

    Route::get('reports', function () {
        return Inertia::render('Private/Dashboard/Report');
    })->name('reports')->middleware(['can:view_report']);

    Route::get('profiles', [ProfileController::class, 'show'])->name('profiles.show');

    Route::put('profiles', [ProfileController::class, 'update'])->name('profiles.update');
});
