<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $crews = User::withTrashed()->paginate(10)->withPath('/crews');
        // TODO only allow some role to view deleted

        return Inertia::render('Private/Crew/Index', [
            'crews' => $crews,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Private/Crew/Create');
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
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
