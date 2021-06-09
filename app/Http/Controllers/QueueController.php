<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Queue;
use App\Models\Store;
use App\Models\Package;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Whatsapp;
use App\Models\Personality;
use Illuminate\Support\Str;
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
    public function index(Request $request)
    {
        if (Auth::user()->hasPermissionTo('both queues')) {
            $queues = Queue::filter($request->only('search', 'status'))->with('car')->paginate(10)->withQueryString();
        } else {
            $queues = Queue::where('store_id', Auth::user()->store->id)->filter($request->only('search', 'status'))->with('car')->paginate(10)->withQueryString();
        }

        return Inertia::render('Private/Queue/Index', [
            'filters' => $request->all('search', 'status'),
            'queues' => $queues
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

        if ($request->car_id) {
            $car = Car::find($request->car_id);

            if ($request->customer_id) {
                $customer = Customer::find($request->customer_id);

                $car->owners()->sync($customer);

                if ($request->personality_id) {
                    $personality = Personality::find($request->personality_id);
                    $personality->customers()->sync($customer);
                }
            }

            if (!$request->customer_id) {
                $request->validate([
                    'name' => ['required', 'max:50'],
                    'phone_no' => ['required', 'max:12'],
                ]);

                $slug = Str::slug($request->name);
                $request->merge(['slug' => $slug]);

                if ($existingCustomer = Customer::where('slug', $request->slug)->orWhere('phone_no', $request->phone_no)->first()) {
                    return Redirect::back()->with('error', 'Customer already exist! <a href="' . route('customers.show', $existingCustomer) . '"style="color:#fff;text-decoration:underline;">Click to view</a>');
                }

                $customer = Customer::create($request->only('name', 'slug', 'phone_no'));

                $car->owners()->save($customer);

                if ($request->personality_id) {
                    $personality = Personality::find($request->personality_id);
                    $personality->customers()->sync($customer);
                }
            }
        }

        if (!$request->car_id) {
            $request->validate([
                'plate_no' => ['required', 'max:10'],
                'model' => ['required', 'max:50'],
                'size' => ['required', 'max:5'],
            ]);

            $plate_no = strtoupper(preg_replace('/\s+/', '', $request->plate_no));
            $slug = Str::slug($plate_no);
            $request->merge(['slug' => $slug]);
            $request->merge(['plate_no' => $plate_no]);

            if ($existingCar = Car::where('slug', $request->slug)->first()) {
                return Redirect::back()->with('error', 'Car already exist! <a href="' . route('cars.show', $existingCar) . '"style="color:#fff;text-decoration:underline;">Click to view</a>');
            }

            $car = Car::create($request->only('plate_no', 'slug', 'model', 'size'));

            if ($request->customer_id) {
                $customer = Customer::find($request->customer_id);

                $car->owners()->sync($customer);

                if ($request->personality_id) {
                    $personality = Personality::find($request->personality_id);
                    $personality->customers()->sync($customer);
                }
            }

            if (!$request->customer_id) {
                $request->validate([
                    'name' => ['required', 'max:50'],
                    'phone_no' => ['required', 'max:12'],
                ]);

                $slug = Str::slug($request->name);
                $request->merge(['slug' => $slug]);

                if ($existingCustomer = Customer::where('slug', $request->slug)->orWhere('phone_no', $request->phone_no)->first()) {
                    return Redirect::back()->with('error', 'Customer already exist! <a href="' . route('customers.show', $existingCustomer) . '"style="color:#fff;text-decoration:underline;">Click to view</a>');
                }

                $customer = Customer::create($request->only('name', 'slug', 'phone_no'));

                $car->owners()->save($customer);

                if ($request->personality_id) {
                    $personality = Personality::find($request->personality_id);
                    $personality->customers()->sync($customer);
                }
            }
        }

        $createdQueue = Queue::create([
            'store_id' => $store->id,
            'car_id' => $car->id,
            'customer_id' => $customer->id,
            'remarks' => $request->input('remarks')
        ]);

        if ($request->package_id) {
            $package = Package::find($request->package_id);
            $createdQueue->package_id = $package->id;

            if ($package->custom_price) {
                $package_custom_price = $request->package_custom_price * 100;
                $createdQueue->package_custom_price = $package_custom_price;
            }

            $createdQueue->save();
        }

        foreach ($request->services_id as $i => $id) {

            if ($request->services_custom_price[$i]) {
                $service_custom_price = $request->services_custom_price[$i] * 100;
            } else {
                $service_custom_price = null;
            }

            $createdQueue->services()->attach([
                $id => ['custom_price' => $service_custom_price]
            ]);
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
            'queue' => $queue->load('car', 'customer', 'store', 'package', 'services'),
            'whatsapps' => Whatsapp::all()
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
        return Inertia::render('Private/Queue/Edit', [
            'queue' => $queue->load('car', 'customer', 'store', 'package', 'services')
        ]);
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
        $request->validate([
            'status' => ['required', 'max:10'],
            'remarks' => ['max:255'],
        ]);

        $queue->update($request->only('status', 'remarks'));

        if ($request->package_id) {
            $package = Package::find($request->package_id);
            $queue->package_id = $package->id;

            if ($package->custom_price) {
                $package_custom_price = $request->package_custom_price * 100;
                $queue->package_custom_price = $package_custom_price;
            }

            $queue->save();
        }

        $queue->services()->detach();

        foreach ($request->services_id as $i => $id) {

            if ($request->services_custom_price[$i]) {
                $service_custom_price = $request->services_custom_price[$i] * 100;
            } else {
                $service_custom_price = null;
            }

            $queue->services()->attach([
                $id => ['custom_price' => $service_custom_price]
            ]);
        }

        return Redirect::route('queues.show', $queue)->with('success', 'Queue updated successfully.');
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

    public function refresh(Store $store)
    {
        return Queue::select('id', 'car_id', 'status')->where('store_id', $store->id)->whereIn('status', ['Waiting', 'Grooming', 'Completed'])->orderBy('updated_at', 'asc')->with('car:id,plate_no,model')->get();
    }

    public function search(Request $request)
    {
        $user = User::find($request->user_id);

        if ($user->hasPermissionTo('both queues')) {
            $daily = Queue::select('id', 'car_id', 'customer_id', 'store_id', 'status', 'move')
                ->where('updated_at', '>', now()->subDays(1))
                ->whereIn('status', ['Collected', 'Cancelled'])
                ->orderBy('updated_at', 'asc')
                ->with('car', 'customer.personalities', 'store')
                ->get();

            $all = Queue::select('id', 'car_id', 'customer_id', 'store_id', 'status', 'move')
                ->whereIn('status', ['Waiting', 'Grooming', 'Completed'])
                ->orderBy('updated_at', 'asc')
                ->with('car', 'customer.personalities', 'store')
                ->get();
        } else {
            $daily = Queue::select('id', 'car_id', 'customer_id', 'status', 'move')
                ->where('store_id', $user->store_id)
                ->where('updated_at', '>', now()->subDays(1))
                ->whereIn('status', ['Collected', 'Cancelled'])
                ->orderBy('updated_at', 'asc')
                ->with('car', 'customer.personalities')
                ->get();

            $all = Queue::select('id', 'car_id', 'customer_id', 'status', 'move')
                ->where('store_id', $user->store_id)
                ->whereIn('status', ['Waiting', 'Grooming', 'Completed'])
                ->orderBy('updated_at', 'asc')
                ->with('car', 'customer.personalities')
                ->get();
        }

        $queues = $daily->merge($all);

        return $queues;
    }

    public function manage()
    {
        return Inertia::render('Private/Dashboard/Manage', [
            'completedWhatsapp' => Whatsapp::where('slug', 'completed-message')->first(),
            'collectedWhatsapp' => Whatsapp::where('slug', 'collected-message')->first(),
            'cancelledWhatsapp' => Whatsapp::where('slug', 'cancelled-message')->first(),
        ]);
    }
}
