<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Whatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whatsapps = Whatsapp::all();
        $whatsappsCount = $whatsapps->count();

        return Inertia::render('Private/Whatsapp/Index', [
            'whatsapps' => $whatsapps,
            'whatsappsCount' => $whatsappsCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Private/Whatsapp/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "<h1 style='text-align:center;padding-top:15rem;'>Not configured!</h1>";
        // dump($request->all());
        // return Redirect::route('whatsapps.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function show(Whatsapp $whatsapp)
    {
        return Inertia::render('Private/Whatsapp/Show', compact('whatsapp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function edit(Whatsapp $whatsapp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Whatsapp $whatsapp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whatsapp $whatsapp)
    {
        //
    }
}
