<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Customer;
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
    public function index()
    {
        $customers = Customer::withTrashed()->paginate(10)->withPath('/customers');
        // TODO only allow some role to view deleted

        return Inertia::render('Private/Customer/Index', [
            'customers' => $customers,
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
            'gender' => ['required', 'max:50']
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        Customer::create($request->only('name', 'slug', 'phone_no', 'gender'));

        return Redirect::route('customers.index')->with('success', 'Customer added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return Inertia::render('Private/Customer/Show', [
            'customer' => $customer->load('cars', 'personalities')
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
            'gender' => ['required', 'max:50']
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $customer->update($request->only('name', 'slug', 'phone_no', 'gender'));

        return Redirect::back()->with('success', 'Customer updated successfully.');
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
        return Redirect::route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    public function restore(Customer $customer)
    {
        $customer->restore();
        return Redirect::back()->with('success', 'Customer restored successfully.');
    }
}
