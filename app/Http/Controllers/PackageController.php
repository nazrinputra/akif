<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Private/Package/Index', [
            'filters' => $request->all('search', 'trashed'),
            'packages' => Package::filter($request->only('search', 'trashed'))->paginate(10)->withQueryString()->withPath('/packages'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Private/Package/Create');
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
            'name' => ['required', 'max:50'],
            'price' => ['required', 'max:5'],
            'frequency' => ['required', 'max:50'],
            'duration' => ['required', 'max:50'],
            'description' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        Package::create($request->only('name', 'slug', 'price', 'frequency', 'duration', 'description'));

        return Redirect::route('packages.index')->with('success', 'Package added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return Inertia::render('Private/Package/Show', [
            'pkg' => $package->load('services')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return Inertia::render('Private/Package/Edit', [
            'pkg' => $package->load('services')
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
        $request->validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'max:5'],
            'frequency' => ['required', 'max:50'],
            'duration' => ['required', 'max:50'],
            'description' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $package->update($request->only('name', 'slug', 'price', 'frequency', 'duration', 'description'));

        return Redirect::route('packages.show', $package)->with('success', 'Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return Redirect::back()->with('success', 'Package deleted successfully.');
    }

    public function restore(Package $package)
    {
        $package->restore();
        return Redirect::back()->with('success', 'Package restored successfully.');
    }
}
