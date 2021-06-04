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

        $owner = Role::create(['name' => 'Owner']);
        $owner->givePermissionTo(['view crews', 'create crews', 'edit crews', 'delete crews']);
        $owner->givePermissionTo(['view roles', 'create roles', 'edit roles']);
        $owner->givePermissionTo(['view cars', 'create cars', 'edit cars', 'delete cars']);
        $owner->givePermissionTo(['view customers', 'create customers', 'edit customers', 'delete customers']);
        $owner->givePermissionTo(['view packages', 'create packages', 'edit packages', 'delete packages']);
        $owner->givePermissionTo(['view services', 'create services', 'edit services', 'delete services']);
        $owner->givePermissionTo(['view personalities', 'create personalities', 'edit personalities', 'delete personalities']);
        $owner->givePermissionTo(['view whatsapps', 'create whatsapps', 'edit whatsapps', 'delete whatsapps']);
        $owner->givePermissionTo(['view deleted']);
        $owner->givePermissionTo(['view report']);
        $owner->givePermissionTo(['edit profile']);
        $owner->givePermissionTo(['restore_deleted']);
        $owner->givePermissionTo(['view queues', 'create queues', 'edit queues', 'reopen queues', 'both queues']);

        $manager = Role::create(['name' => 'Manager']);
        $manager->givePermissionTo(['view cars', 'create cars', 'edit cars', 'delete cars']);
        $manager->givePermissionTo(['view customers', 'create customers', 'edit customers', 'delete customers']);
        $manager->givePermissionTo(['view deleted']);
        $manager->givePermissionTo(['view report']);
        $manager->givePermissionTo(['edit profile']);
        $manager->givePermissionTo(['view queues', 'create queues', 'edit queues', 'reopen queues']);

        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(['view cars', 'create cars', 'edit cars', 'delete cars']);
        $admin->givePermissionTo(['view customers', 'create customers', 'edit customers', 'delete customers']);
        $admin->givePermissionTo(['view deleted']);
        $admin->givePermissionTo(['view queues', 'create queues', 'edit queues', 'reopen queues']);

        $qualityChecker = Role::create(['name' => 'Quality Checker']);
        $qualityChecker->givePermissionTo(['view queues', 'create queues', 'edit queues', 'reopen queues']);

        Role::create(['name' => 'Detailer']);
        Role::create(['name' => 'Accountant']);
        Role::create(['name' => 'Designer']);
        Role::create(['name' => 'Maintenance']);

        Role::create(['name' => 'Sales']);
        Role::create(['name' => 'Painter']);
        Role::create(['name' => 'Mechanics']);
        Role::create(['name' => 'Tinted Crew']);
        Role::create(['name' => 'HR']);

        Role::create(['name' => 'IT'])->givePermissionTo(Permission::all());
    }
}
