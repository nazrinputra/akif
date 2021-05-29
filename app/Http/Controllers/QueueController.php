<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Queue;
use App\Models\Store;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Private/Queue/Index', [
            'queues' => Queue::with('car')->paginate(10)
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
        $store = Auth::user()->store;
        $request->merge(['store_id' => $store->id]);
        $package = Package::find($request->package_id);

        $createdQueue = Queue::create($request->only('store_id', 'car_id', 'customer_id'));
        $createdQueue->packages()->save($package);

        foreach ($request->services_id as $id) {
            $service = Service::find($id);
            $createdQueue->services()->save($service);
        }

        return Redirect::route('queues.show', $createdQueue)->with('success', 'Queue created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function show(Queue $queue)
    {
        return Inertia::render('Private/Queue/Show', [
            'queue' => $queue->load('car', 'customer', 'store', 'packages', 'services')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function edit(Queue $queue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Queue $queue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queue $queue)
    {
        //
    }

    public function search(Store $store)
    {
        return Queue::select('id', 'car_id', 'status')->where('store_id', $store->id)->whereIn('status', ['Waiting', 'Grooming', 'Completed'])->with('car:id,plate_no,model')->get();
    }
}
