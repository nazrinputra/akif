<?php

use Inertia\Inertia;
use App\Models\Customer;
use App\Models\Personality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('behaviour', function () {
        return Inertia::render('Private/Dashboard/Behaviour', [
            'customers' => Customer::select('*')->orderBy('name')->get(),
            'personalities' => Personality::select('*')->orderBy('name')->get(),
        ]);
    })->name('behaviour');

    Route::post('behaviour', function (Request $request) {
        $customer = Customer::find($request->customer_id);
        $personality = Personality::find($request->personality_id);

        if ($customer->personalities->contains($personality)) {
            return Redirect::back()->with(
                'error',
                'Link already exist! <a href="' . route('customers.show', $customer) . '"style="color:#fff;text-decoration:underline;">View customer</a> or <a href="' . route('personalities.show', $personality) . '"style="color:#fff;text-decoration:underline;">view personality</a>'
            );
        }

        $customer->personalities()->save($personality);

        return Redirect::back()->with('success', 'Promotion linked successfully. <a href="' . route('customers.show', $customer) . '"style="color:#fff;text-decoration:underline;">View customer</a> or <a href="' . route('personalities.show', $personality) . '"style="color:#fff;text-decoration:underline;">view personality</a>');
    })->name('behaviour.store');
});
