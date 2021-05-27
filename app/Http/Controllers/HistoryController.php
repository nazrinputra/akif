<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Private/History/Index', [
            'histories' => Queue::whereNotIn('status', ['Waiting', 'Grooming', 'Completed'])->with('car', 'customer')->paginate(10)->withQueryString()
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
     * @param  \App\Models\Queue  $history
     * @return \Illuminate\Http\Response
     */
    public function show(Queue $history)
    {
        return Inertia::render('Private/History/Show', [
            'history' => $history->load('car', 'customer', 'store')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Queue  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(Queue $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Queue  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Queue $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Queue  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queue $history)
    {
        $history->delete();
        return Redirect::back()->with('success', 'Queue deleted successfully.');
    }

    public function restore(Queue $history)
    {
        $history->restore();
        return Redirect::back()->with('success', 'Queue restored successfully.');
    }

    public function search(Request $request)
    {
        return Queue::where('name', 'like', '%' . $request->input('query') . '%')
            ->orWhere('description', 'like', '%' . $request->input('query') . '%')
            ->limit(3)
            ->get();
    }
}
