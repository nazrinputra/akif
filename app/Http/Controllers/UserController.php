<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Store;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Private/Crew/Index', [
            'filters' => $request->all('search', 'trashed'),
            'crews' => User::filter($request->only('search', 'trashed'))->paginate(10)->withPath('/crews'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Private/Crew/Create', [
            'stores' => Store::all(),
            'roles' => Role::all(),
        ]);
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
            'email' => ['required', 'max:50'],
            'store_id' => ['required'],
            'role_id' => ['required']
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);
        $request->merge(['password' => '$2y$10$R5fmLgPcuHt7OVogqqNEWurkIjZL.kIOwd.wjrfGGvG1wYi2xLxMi']); // password

        User::create($request->only('name', 'slug', 'phone_no', 'email', 'password', 'store_id', 'role_id'));

        return Redirect::route('crews.index')->with('success', 'Crew added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $crew
     * @return \Illuminate\Http\Response
     */
    public function show(User $crew)
    {
        return Inertia::render('Private/Crew/Show', [
            'crew' => $crew->load('role', 'store')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $crew)
    {
        return Inertia::render('Private/Crew/Edit', [
            'stores' => Store::all(),
            'roles' => Role::all(),
            'crew' => $crew->load('role', 'store')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $crew)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'phone_no' => ['required', 'min:9', 'max:12'],
            'email' => ['required', 'max:50'],
            'store_id' => ['required'],
            'role_id' => ['required']
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $crew->update($request->only('name', 'slug', 'phone_no', 'email', 'store_id', 'role_id'));

        return Redirect::route('crews.show', $crew)->with('success', 'Crew updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $crew)
    {
        $crew->delete();
        return Redirect::back()->with('success', 'Crew deleted successfully.');
    }

    public function restore(User $crew)
    {
        $crew->restore();
        return Redirect::back()->with('success', 'Crew restored successfully.');
    }
}
