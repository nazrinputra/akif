<?php

use Inertia\Inertia;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('promotion', function () {
        return Inertia::render('Private/Dashboard/Promotion', [
            'services' => Service::select('*')->orderBy('name')->get(),
            'packages' => Package::select('*')->orderBy('name')->get(),
        ]);
    })->name('promotion');

    Route::post('promotion', function (Request $request) {
        $package = Package::find($request->package_id);
        $service = Service::find($request->service_id);

        if ($package->services->contains($service)) {
            return Redirect::back()->with(
                'error',
                'Link already exist! <a href="' . route('packages.show', $package) . '"style="color:#fff;text-decoration:underline;">View package</a> or <a href="' . route('services.show', $service) . '"style="color:#fff;text-decoration:underline;">view service</a>'
            );
        }

        $package->services()->save($service);

        return Redirect::back()->with('success', 'Promotion linked successfully. <a href="' . route('packages.show', $package) . '"style="color:#fff;text-decoration:underline;">View package</a> or <a href="' . route('services.show', $service) . '"style="color:#fff;text-decoration:underline;">view service</a>');
    })->name('promotion.store');
});
