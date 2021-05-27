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
    public function index(Request $request)
    {
        return Inertia::render('Private/Car/Index', [
            'filters' => $request->all('search', 'trashed'),
            'cars' => Car::select('*')->filter($request->only('search', 'trashed'))->paginate(10)->withQueryString()
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

        $plate_no = preg_replace('/\s+/', '', $request->plate_no);
        $slug = Str::slug($plate_no);
        $request->merge(['slug' => $slug]);

        if ($car = Car::where('slug', $request->slug)->first()) {
            return Redirect::back()->with('error', 'Car already exist! <a href="' . route('cars.show', $car) . '"style="color:#fff;text-decoration:underline;">Click to view</a>');
        }

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
        return Inertia::render('Private/Car/Edit', [
            'car' => $car->load('owners')
        ]);
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
        $request->validate([
            'plate_no' => ['required', 'max:10'],
            'brand' => ['required', 'max:10'],
            'model' => ['required', 'max:50'],
            'color' => ['required', 'max:50'],
            'size' => ['required', 'max:5'],
        ]);

        $slug = Str::slug($request->plate_no);
        $request->merge(['slug' => $slug]);

        $car->update($request->only('plate_no', 'slug', 'brand', 'model', 'color', 'size'));

        return Redirect::route('cars.show', $car)->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return Redirect::back()->with('success', 'Car deleted successfully.');
    }

    public function restore(Car $car)
    {
        $car->restore();
        return Redirect::back()->with('success', 'Car restored successfully.');
    }

    public function search(Request $request)
    {
        return Car::where('plate_no', 'like', '%' . $request->input('query') . '%')
            ->orWhere('model', 'like', '%' . $request->input('query') . '%')
            ->limit(3)
            ->get();
    }
}
