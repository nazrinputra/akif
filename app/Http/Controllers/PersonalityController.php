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
    public function index()
    {
        $personalities = Personality::withTrashed()->paginate(10)->withPath('/personalities');
        // TODO only allow some role to view deleted

        return Inertia::render('Private/Personality/Index', [
            'personalities' => $personalities,
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
            'description' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        Personality::create($request->only('name', 'slug', 'description'));

        return Redirect::route('personalities.index')->with('success', 'Personality added successfully.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personality  $personality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personality $personality)
    {
        //
    }
}
