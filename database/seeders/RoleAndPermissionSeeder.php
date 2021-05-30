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

        // create roles and assign created permissions

        // this can be done as separate statements
        $owner = Role::create(['name' => 'owner']);
        $owner->givePermissionTo($createCrew, $editCrew, $deleteCrew, $restoreDeleted);

        // or may be done by chaining
        Role::create(['name' => 'admin'])
            ->givePermissionTo([$createCrew, $editCrew, $deleteCrew, $viewDeleted]);

        $superAdmin = Role::create(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());
    }
}
