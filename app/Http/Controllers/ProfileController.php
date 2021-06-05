<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Inertia::render('Private/Dashboard/Profile', [
            'stores' => Store::all(),
            'roles' => Role::all(),
            'healths' => Auth::user()->healths,
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
    public function update(Request $request)
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

        if ($request->has('password') && $request->password != '') {
            $request->validate([
                'password' => ['required', 'confirmed', 'min:8']
            ]);

            $password = Hash::make($request->password);
            $request->merge(['password' => $password]);
        } else {
            $password = Auth::user()->password;
            $request->merge(['password' => $password]);
        }

        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        Auth::user()->update($request->only(
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
        Auth::user()->syncRoles($role);

        $healths = $request->healths_id;
        Auth::user()->healths()->detach();
        foreach ($healths as $health) {
            Auth::user()->healths()->attach($health);
        }

        return Redirect::route('profiles.show')->with('success', 'Profile updated successfully.');
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
