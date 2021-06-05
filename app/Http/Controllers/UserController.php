<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

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
            'crews' => User::where('id', '<>', Auth::id())->filter($request->only('search', 'trashed'))->paginate(10)->withQueryString()
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
            'enrolled_at' => ['date'],
            'resigned_at' => ['date'],
            'role_id' => ['required'],
            'store_id' => ['required'],
            'address' => ['max:255'],
            'ic_no' => ['max:14', 'min:14'],
            'bank' => ['required'],
            'acc_no' => ['required'],
            'emergency_name_1' => ['required', 'max:50'],
            'emergency_phone_no_1' => ['required', 'max:12'],
            'emergency_name_2' => ['required', 'max:50'],
            'emergency_phone_no_2' => ['required', 'max:12'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);
        $password = Hash::make($request->password);
        $request->merge(['password' => $password]);

        if ($crew = User::where('slug', $request->slug)->orWhere('phone_no', $request->phone_no)->orWhere('email', $request->email)->first()) {
            return Redirect::back()->with('error', 'Crew already exist! <a href="' . route('crews.show', $crew) . '"style="color:#fff;text-decoration:underline;">Click to view</a>');
        }

        $createdCrew = User::create($request->only(
            'name',
            'slug',
            'phone_no',
            'email',
            'password',
            'store_id',
            'enrolled_at',
            'resigned_at',
            'oku_card',
            'address',
            'ic_no',
            'bank',
            'acc_no',
            'status',
            'shirt_size',
            'motor_license',
            'car_license',
            'emergency_name_1',
            'emergency_phone_no_1',
            'emergency_relation_1',
            'emergency_name_2',
            'emergency_phone_no_2',
            'emergency_relation_2',
        ));
        $role = Role::find($request->role_id);
        $createdCrew->syncRoles($role);

        event(new Registered($createdCrew));

        return Redirect::route('crews.show', $createdCrew)->with('success', 'Crew added successfully.');
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
            'crew' => $crew->load('store', 'roles')
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
            'crew' => $crew->load('store', 'roles')
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
            'role_id' => ['required'],
            'store_id' => ['required'],
        ]);

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $crew->update($request->only('name', 'slug', 'phone_no', 'email', 'store_id'));
        $role = Role::find($request->role_id);
        $crew->syncRoles($role);

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

    public function roles(Request $request)
    {
        return User::doesntHave('roles')->where('name', 'like', '%' . $request->input('query') . '%')->limit(3)->get();
    }

    public function health(Request $request)
    {
        return User::where('name', 'like', '%' . $request->input('query') . '%')
            ->limit(3)
            ->get();
    }
}
