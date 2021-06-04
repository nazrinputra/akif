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

        // profile
        Permission::create(['name' => 'edit profile']);

        // report
        Permission::create(['name' => 'view report']);

        // soft delete
        Permission::create(['name' => 'view deleted']);
        Permission::create(['name' => 'restore deleted']);

        // car
        Permission::create(['name' => 'view cars']);
        Permission::create(['name' => 'create cars']);
        Permission::create(['name' => 'edit cars']);
        Permission::create(['name' => 'delete cars']);

        // customer
        Permission::create(['name' => 'view customers']);
        Permission::create(['name' => 'create customers']);
        Permission::create(['name' => 'edit customers']);
        Permission::create(['name' => 'delete customers']);

        // packages
        Permission::create(['name' => 'view packages']);
        Permission::create(['name' => 'create packages']);
        Permission::create(['name' => 'edit packages']);
        Permission::create(['name' => 'delete packages']);

        // services
        Permission::create(['name' => 'view services']);
        Permission::create(['name' => 'create services']);
        Permission::create(['name' => 'edit services']);
        Permission::create(['name' => 'delete services']);

        // personality
        Permission::create(['name' => 'view personalities']);
        Permission::create(['name' => 'create personalities']);
        Permission::create(['name' => 'edit personalities']);
        Permission::create(['name' => 'delete personalities']);

        // whatsapp
        Permission::create(['name' => 'view whatsapps']);
        Permission::create(['name' => 'create whatsapps']);
        Permission::create(['name' => 'edit whatsapps']);
        Permission::create(['name' => 'delete whatsapps']);

        // queue
        Permission::create(['name' => 'view queues']);
        Permission::create(['name' => 'create queues']);
        Permission::create(['name' => 'edit queues']);
        Permission::create(['name' => 'reopen queues']);
        Permission::create(['name' => 'both queues']);

        // crew
        Permission::create(['name' => 'view crews']);
        Permission::create(['name' => 'create crews']);
        Permission::create(['name' => 'edit crews']);
        Permission::create(['name' => 'delete crews']);

        // role
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        // health
        Permission::create(['name' => 'view healths']);
        Permission::create(['name' => 'create healths']);
        Permission::create(['name' => 'edit healths']);
        Permission::create(['name' => 'delete healths']);
    }
}
