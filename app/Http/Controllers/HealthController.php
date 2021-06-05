<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Health;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Private/Health/Index', [
            'filters' => $request->all('search', 'trashed'),
            'healths' => Health::filter($request->only('search', 'trashed'))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Private/Health/Create');
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
            'description' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        if ($health = Health::where('slug', $request->slug)->first()) {
            return Redirect::back()->with('error', 'Health condition already exist! <a href="' . route('healths.show', $health) . '"style="color:#fff;text-decoration:underline;">Click to view</a>');
        }

        $createdHealth = Health::create($request->only('name', 'slug', 'description'));

        return Redirect::route('healths.show', $createdHealth)->with('success', 'Health condition added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function show(Health $health)
    {
        return Inertia::render('Private/Health/Show', [
            'health' => $health->load('crews')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function edit(Health $health)
    {
        return Inertia::render('Private/Health/Edit', [
            'health' => $health->load('crews')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Health $health)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $health->update($request->only('name', 'slug', 'description'));

        return Redirect::route('healths.show', $health)->with('success', 'Health condition updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Health  $health
     * @return \Illuminate\Http\Response
     */
    public function destroy(Health $health)
    {
        $health->delete();
        return Redirect::back()->with('success', 'Health condition deleted successfully.');
    }

    public function restore(Health $health)
    {
        $health->restore();
        return Redirect::back()->with('success', 'Health condition restored successfully.');
    }

    public function search(Request $request)
    {
        return Health::where('name', 'like', '%' . $request->input('query') . '%')
            ->orWhere('description', 'like', '%' . $request->input('query') . '%')
            ->limit(3)
            ->get();
    }
}
