<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Personality;
use Illuminate\Http\Request;

class PersonalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalities = Personality::all();
        $personalitiesCount = $personalities->count();

        return Inertia::render('Private/Personality/Index', [
            'personalities' => $personalities,
            'personalitiesCount' => $personalitiesCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
