<?php

use App\Models\Queue;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('services/search', [ServiceController::class, 'search'])
    ->name('services.search');

Route::get('packages/search', [PackageController::class, 'search'])
    ->name('packages.search');

Route::get('services/all', [ServiceController::class, 'all'])
    ->name('services.all');

Route::get('packages/all', [PackageController::class, 'all'])
    ->name('packages.all');

Route::post('package/link', function (Request $request) {
    $service = Service::find($request->service_id);
    $package = Package::find($request->package_id);
    $service->packages()->save($package);
    return Redirect::back();
})->name('package.link');

Route::post('package/unlink', function (Request $request) {
    $service = Service::find($request->service_id);
    $package = Package::find($request->package_id);
    $service->packages()->detach($package);
    return Redirect::back();
})->name('package.unlink');

Route::post('service/add', function (Request $request) {
    $service = Service::find($request->service_id);
    $queue = Queue::find($request->queue_id);
    $queue->services()->save($service);
    return Redirect::back();
})->name('service.add');

Route::post('service/remove', function (Request $request) {
    $service = Service::find($request->service_id);
    $queue = Queue::find($request->queue_id);
    $queue->services()->detach($service);
    return Redirect::back();
})->name('service.remove');

Route::post('package/add', function (Request $request) {
    $package = Package::find($request->package_id);
    $queue = Queue::find($request->queue_id);
    $queue->packages()->save($package);
    return Redirect::back();
})->name('package.add');

Route::post('package/remove', function (Request $request) {
    $package = Package::find($request->package_id);
    $queue = Queue::find($request->queue_id);
    $queue->packages()->detach($package);
    return Redirect::back();
})->name('package.remove');

Route::post('queues/manage', function (Request $request) {
    $queue = Queue::find($request->queue_id);
    $queue->update($request->only('status'));
    return Redirect::back();
})->name('manage');

Route::post('queues/bottom', function (Request $request) {
    $queue = Queue::find($request->queue_id);
    $queue->update($request->only('move'));
    return Redirect::back();
})->name('bottom');
