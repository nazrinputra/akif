<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\WhatsappController;
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

require __DIR__ . '/api/customer.php';
require __DIR__ . '/api/product.php';
require __DIR__ . '/api/access.php';

URL::forceScheme('https');

Route::get('store/{store:slug}/queues', [QueueController::class, 'refresh'])->name('queues.refresh');

Route::post('search/queues', [QueueController::class, 'search'])->name('queues.search');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
