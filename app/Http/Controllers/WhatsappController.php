<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Whatsapp;
use Illuminate\Support\Str;
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
        $whatsapps = Whatsapp::withTrashed()->paginate(10)->withPath('/whatsapps');
        // TODO only allow some role to view deleted

        return Inertia::render('Private/Whatsapp/Index', [
            'whatsapps' => $whatsapps,
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
        $request->validate([
            'title' => ['required', 'max:50'],
            'message' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->title);
        $request->merge(['slug' => $slug]);

        Whatsapp::create($request->only('title', 'slug', 'message'));

        return Redirect::route('whatsapps.index')->with('success', 'Message added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function show(Whatsapp $whatsapp)
    {
        // return Inertia::render('Private/Whatsapp/Show', compact('whatsapp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function edit(Whatsapp $whatsapp)
    {
        return Inertia::render('Private/Whatsapp/Edit', compact('whatsapp'));
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
        $request->validate([
            'title' => ['required', 'max:50'],
            'message' => ['required', 'max:255'],
        ]);

        $slug = Str::slug($request->title);
        $request->merge(['slug' => $slug]);

        $whatsapp->update($request->only('title', 'slug', 'message'));

        return Redirect::back()->with('success', 'Message updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whatsapp $whatsapp)
    {
        $whatsapp->delete();
        return Redirect::route('whatsapps.index')->with('success', 'Message deleted successfully.');
    }

    public function restore(Whatsapp $whatsapp)
    {
        $whatsapp->restore();
        return Redirect::back()->with('success', 'Message restored successfully.');
    }
}
