<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        $carsCount = $cars->count();

        return Inertia::render('Private/Car/Index', [
            'cars' => $cars,
            'carsCount' => $carsCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Private/Car/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'plate_no' => ['required', 'max:10'],
            'brand' => ['required', 'max:10'],
            'model' => ['required', 'max:50'],
            'color' => ['required', 'max:50'],
            'size' => ['required', 'max:5'],
        ]);

        $slug = Str::slug($request->plate_no);
        $request->merge(['slug' => $slug]);

        Car::create($request->only('plate_no', 'slug', 'brand', 'model', 'color', 'size'));

        return Redirect::route('cars.index')->with('success', 'Car added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return Inertia::render('Private/Car/Show', [
            'car' => $car->load('owners')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
