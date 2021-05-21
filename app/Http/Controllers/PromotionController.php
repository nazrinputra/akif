<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Package;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Package::all();
        $promotionsCount = $promotions->count();
        $firstPromotion = $promotions->first();
        $otherPromotions = $promotions->skip(1);

        return Inertia::render('Public/Promotions', [
            'promotionsCount' => $promotionsCount,
            'firstPromotion' => $firstPromotion,
            'otherPromotions' => $otherPromotions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return Inertia::render('Public/Promotion', [
            'promotion' => $package->load('services')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
