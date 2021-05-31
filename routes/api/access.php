<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('permissions/search', [RoleController::class, 'search'])
    ->name('permissions.search');

Route::get('crews/search', [UserController::class, 'search'])
    ->name('crews.search');

Route::post('permissions/revoke', [RoleController::class, 'revoke_permission'])->name('permissions.revoke');

Route::post('permissions/give', [RoleController::class, 'give_permission'])->name('permissions.give');

Route::post('roles/revoke', [RoleController::class, 'revoke_role'])->name('roles.revoke');

Route::post('roles/give', [RoleController::class, 'give_role'])->name('roles.give');
