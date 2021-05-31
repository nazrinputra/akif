<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $roles = Role::all();
        } else {
            $roles = Role::whereNotIn('name', ['Super Admin'])->get();
        }


        return Inertia::render('Private/Role/Index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Private/Role/Create');
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
        ]);

        $createdRole = Role::create($request->only('name'));

        foreach ($request->permissions as $id) {
            $permission = Permission::find($id);
            $createdRole->givePermissionTo($permission);
        }

        foreach ($request->crews as $id) {
            $crew = User::find($id);
            $crew->assignRole($createdRole);
        }

        return Redirect::route('roles.show', $createdRole)->with('success', 'Role added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return Inertia::render('Private/Role/Show', [
            'role' => $role->load('permissions'),
            'crews' => User::role($role)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return Inertia::render('Private/Role/Edit', [
            'role' => $role->load('permissions'),
            'crews' => User::role($role)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
        ]);

        $role->update($request->only('name'));

        return Redirect::route('roles.show', $role)->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return Redirect::route('roles.index')->with('success', 'Role deleted successfully.');
    }

    public function revoke_permission(Request $request)
    {
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        $role->revokePermissionTo($permission);
        return Redirect::back();
    }

    public function give_permission(Request $request)
    {
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        $role->givePermissionTo($permission);
        return Redirect::back();
    }

    public function search(Request $request)
    {
        return Permission::where('name', 'like', '%' . $request->input('query') . '%')
            ->limit(3)
            ->get();
    }

    public function revoke_role(Request $request)
    {
        $role = Role::find($request->role_id);
        $crew = User::find($request->crew_id);
        $crew->removeRole($role);
        return Redirect::back();
    }

    public function give_role(Request $request)
    {
        $role = Role::find($request->role_id);
        $crew = User::find($request->crew_id);
        $crew->assignRole($role);
        return Redirect::back();
    }
}
