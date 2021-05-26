<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Private/Service/Index', [
            'filters' => $request->all('search', 'trashed'),
            'services' => Service::filter($request->only('search', 'trashed'))->paginate(10)->withQueryString()->withPath('/services'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Private/Service/Create');
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
            'description' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        if ($service = Service::where('slug', $request->slug)->first()) {
            return Redirect::back()->with('error', 'Service already exist! <a href="' . route('services.show', $service) . '"style="color:#fff;text-decoration:underline;">Click to view</a>');
        }

        Service::create($request->only('name', 'slug', 'price', 'description'));

        return Redirect::route('services.index')->with('success', 'Service added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return Inertia::render('Private/Service/Show', [
            'service' => $service->load('packages')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return Inertia::render('Private/Service/Edit', [
            'service' => $service->load('packages')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'max:5'],
            'description' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $service->update($request->only('name', 'slug', 'price', 'description'));

        return Redirect::route('services.show', $service)->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return Redirect::back()->with('success', 'Service deleted successfully.');
    }

    public function restore(Service $service)
    {
        $service->restore();
        return Redirect::back()->with('success', 'Service restored successfully.');
    }

    public function search(Request $request)
    {
        return Service::where('name', 'like', '%' . $request->input('query') . '%')
            ->orWhere('description', 'like', '%' . $request->input('query') . '%')
            ->limit(3)
            ->get();
    }
}
