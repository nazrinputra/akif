<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
        return Inertia::render('Private/Whatsapp/Index', [
            'whatsapps' => Whatsapp::all()
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
     * @param  \App\Models\Whatsapp  $whatsapp
     * @return \Illuminate\Http\Response
     */
    public function show(Whatsapp $whatsapp)
    {
        $whatsapp->message = urldecode($whatsapp->message);
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
        $whatsapp->message = urldecode($whatsapp->message);
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
            'message' => ['required'],
        ]);

        $slug = Str::slug($request->title);
        $message = urlencode($request->message);
        $request->merge(['slug' => $slug]);
        $request->merge(['message' => $message]);

        $whatsapp->update($request->only('title', 'slug', 'message'));

        return Redirect::route('whatsapps.show', $whatsapp)->with('success', 'Message updated successfully.');
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
        return Redirect::back()->with('success', 'Message deleted successfully.');
    }

    public function restore(Whatsapp $whatsapp)
    {
        $whatsapp->restore();
        return Redirect::back()->with('success', 'Message restored successfully.');
    }

    public function send(Whatsapp $whatsapp, $customer)
    {
        return Inertia::render('Private/Whatsapp/Send', [
            'whatsapp' => $whatsapp,
            'message' => urldecode($whatsapp->message),
            'customer' => Customer::where('slug', $customer)->first()
        ]);
    }
}
