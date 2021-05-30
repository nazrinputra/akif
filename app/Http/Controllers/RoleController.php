<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
        return Inertia::render('Private/Role/Index', [
            'roles' => Role::all()
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
            'role' => $role->load('permissions')
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
        return Redirect::back()->with('success', 'Role deleted successfully.');
    }

    public function revoke(Request $request)
    {
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        $role->revokePermissionTo($permission);
        return Redirect::back();
    }

    public function give(Request $request)
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
}
