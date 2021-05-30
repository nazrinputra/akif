<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $viewDeleted = Permission::create(['name' => 'view_deleted']);
        $restoreDeleted = Permission::create(['name' => 'restore_deleted']);
        $createCrew = Permission::create(['name' => 'create_crews']);
        $editCrew = Permission::create(['name' => 'edit_crews']);
        $deleteCrew = Permission::create(['name' => 'delete_crews']);
        $editRole = Permission::create(['name' => 'edit_role']);
        $editStore = Permission::create(['name' => 'edit_store']);

        // create roles and assign created permissions
        Role::create(['name' => 'Super Admin'])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => 'Admin']);

        Role::create(['name' => 'Owner']);

        Role::create(['name' => 'Crew']);

        Role::create(['name' => 'Detailer']);

        Role::create(['name' => 'Quality Checker']);
    }
}
