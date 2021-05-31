<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view_deleted']);
        Permission::create(['name' => 'restore_deleted']);
        Permission::create(['name' => 'create_crews']);
        Permission::create(['name' => 'edit_crews']);
        Permission::create(['name' => 'delete_crews']);
        Permission::create(['name' => 'edit_role']);
        Permission::create(['name' => 'edit_store']);
        Permission::create(['name' => 'edit_closed_queue']);
    }
}
