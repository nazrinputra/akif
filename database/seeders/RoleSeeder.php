<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(['view cars', 'create cars', 'edit cars', 'delete cars']);
        $admin->givePermissionTo(['view customers', 'create customers', 'edit customers', 'delete customers']);
        $admin->givePermissionTo(['view packages', 'create packages', 'edit packages', 'delete packages']);
        $admin->givePermissionTo(['view services', 'create services', 'edit services', 'delete services']);
        $admin->givePermissionTo(['view deleted']);
        $admin->givePermissionTo(['view queues', 'create queues', 'edit queues']);

        Role::create(['name' => 'IT'])->givePermissionTo(Permission::all());
    }
}
