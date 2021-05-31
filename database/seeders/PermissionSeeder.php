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

        // soft delete
        Permission::create(['name' => 'view_deleted']);
        Permission::create(['name' => 'restore_deleted']);

        // crew
        Permission::create(['name' => 'create_crews']);
        Permission::create(['name' => 'edit_crews']);
        Permission::create(['name' => 'delete_crews']);

        // role
        Permission::create(['name' => 'create_roles']);
        Permission::create(['name' => 'edit_roles']);
        Permission::create(['name' => 'delete_roles']);

        // car
        Permission::create(['name' => 'create_cars']);
        Permission::create(['name' => 'edit_cars']);
        Permission::create(['name' => 'delete_cars']);

        // customer
        Permission::create(['name' => 'create_customers']);
        Permission::create(['name' => 'edit_customers']);
        Permission::create(['name' => 'delete_customers']);

        // packages
        Permission::create(['name' => 'create_packages']);
        Permission::create(['name' => 'edit_packages']);
        Permission::create(['name' => 'delete_packages']);

        // services
        Permission::create(['name' => 'create_services']);
        Permission::create(['name' => 'edit_services']);
        Permission::create(['name' => 'delete_services']);

        // personality
        Permission::create(['name' => 'create_personalities']);
        Permission::create(['name' => 'edit_personalities']);
        Permission::create(['name' => 'delete_personalities']);

        // whatsapp
        Permission::create(['name' => 'create_whatsapps']);
        Permission::create(['name' => 'edit_whatsapps']);
        Permission::create(['name' => 'delete_whatsapps']);

        // profile
        Permission::create(['name' => 'edit_profile']);

        // queue
        Permission::create(['name' => 'create_queues']);
        Permission::create(['name' => 'edit_queues']);
        Permission::create(['name' => 'reopen_queues']);
    }
}
