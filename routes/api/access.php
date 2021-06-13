<?php

use App\Http\Controllers\HealthController;
use App\Models\User;
use App\Models\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

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

Route::get('healths/search', [HealthController::class, 'search'])
    ->name('healths.search');

Route::get('crews/roles', [UserController::class, 'roles'])
    ->name('crews.roles');

Route::get('crews/health', [UserController::class, 'health'])
    ->name('crews.healths');

Route::get('permissions/all', function () {
    return Permission::all();
})->name('permissions.all');

Route::get('healths/all', function () {
    return Health::all();
})->name('healths.all');

Route::get('detailers/all', function () {
    return User::role('Detailer')->get();;
})->name('detailers.all');

Route::post('permissions/revoke', [RoleController::class, 'revoke_permission'])->name('permissions.revoke');

Route::post('permissions/give', [RoleController::class, 'give_permission'])->name('permissions.give');

Route::post('roles/revoke', [RoleController::class, 'revoke_role'])->name('roles.revoke');

Route::post('roles/give', [RoleController::class, 'give_role'])->name('roles.give');

Route::post('crew/link', function (Request $request) {
    $health = Health::find($request->health_id);
    $crew = User::find($request->crew_id);
    $crew->healths()->save($health);
    return Redirect::back();
})->name('crew.link');

Route::post('crew/unlink', function (Request $request) {
    $health = Health::find($request->health_id);
    $crew = User::find($request->crew_id);
    $crew->healths()->detach($health);
    return Redirect::back();
})->name('crew.unlink');
