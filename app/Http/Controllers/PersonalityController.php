<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Personality;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PersonalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Private/Personality/Index', [
            'filters' => $request->all('search', 'trashed'),
            'personalities' => Personality::filter($request->only('search', 'trashed'))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Private/Personality/Create');
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
            'color' => ['required'],
            'description' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        if ($personality = Personality::where('slug', $request->slug)->first()) {
            return Redirect::back()->with('error', 'Personality already exist! <a href="' . route('personalities.show', $personality) . '"style="color:#fff;text-decoration:underline;">Click to view</a>');
        }

        $createdPersonality = Personality::create($request->only('name', 'slug', 'color', 'description'));

        return Redirect::route('personalities.show', $createdPersonality)->with('success', 'Personality added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personality  $personality
     * @return \Illuminate\Http\Response
     */
    public function show(Personality $personality)
    {
        return Inertia::render('Private/Personality/Show', [
            'personality' => $personality->load('customers')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personality  $personality
     * @return \Illuminate\Http\Response
     */
    public function edit(Personality $personality)
    {
        return Inertia::render('Private/Personality/Edit', [
            'personality' => $personality->load('customers')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personality  $personality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personality $personality)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $personality->update($request->only('name', 'slug', 'color', 'description'));

        return Redirect::route('personalities.show', $personality)->with('success', 'Personality updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personality  $personality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personality $personality)
    {
        $personality->delete();
        return Redirect::back()->with('success', 'Personality deleted successfully.');
    }

    public function restore(Personality $personality)
    {
        $personality->restore();
        return Redirect::back()->with('success', 'Personality restored successfully.');
    }

    public function search(Request $request)
    {
        return Personality::where('name', 'like', '%' . $request->input('query') . '%')
            ->orWhere('description', 'like', '%' . $request->input('query') . '%')
            ->limit(3)
            ->get();
    }
}
