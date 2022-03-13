<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Inertia;
use App\Models\Customer;
use App\Models\Personality;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Private/Customer/Index', [
            'filters' => $request->all('search', 'trashed'),
            'customers' => Customer::filter($request->only('search', 'trashed'))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Private/Customer/Create');
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
            'phone_no' => ['required', 'max:12'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        if ($customer = Customer::where('phone_no', $request->phone_no)->first()) {
            return Redirect::back()->with('error', 'Phone no already exist! <a href="' . route('customers.show', $customer) . '"style="color:#fff;text-decoration:underline;">Click to view</a>');
        }

        $createdCustomer = Customer::create($request->only('name', 'slug', 'phone_no'));

        if ($request->input('car_id') != null) {
            $car = Car::find($request->input('car_id'));
            $car->owners()->save($createdCustomer);
        }

        if ($request->input('personality_id') != null) {
            $personality = Personality::find($request->input('personality_id'));
            $personality->customers()->save($createdCustomer);
        }

        return Redirect::route('customers.show', $createdCustomer)->with('success', 'Customer added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $queues = $customer->queues->whereNotIn('status', ['Waiting', 'Grooming', 'Completed']);
        return Inertia::render('Private/Customer/Show', [
            'customer' => $customer->load('cars', 'personalities'),
            'queues' => $queues->load('store')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return Inertia::render('Private/Customer/Edit', [
            'customer' => $customer->load('cars', 'personalities')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'phone_no' => ['required', 'max:12'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $customer->update($request->only('name', 'slug', 'phone_no'));

        return Redirect::route('customers.show', $customer)->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return Redirect::back()->with('success', 'Customer deleted successfully.');
    }

    public function restore(Customer $customer)
    {
        $customer->restore();
        return Redirect::back()->with('success', 'Customer restored successfully.');
    }

    public function search(Request $request)
    {
        return Customer::where('phone_no', 'like', '%' . $request->input('query') . '%')
            ->limit(3)
            ->get();
    }
}
