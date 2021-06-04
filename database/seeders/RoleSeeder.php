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
        $owner->givePermissionTo(['view_crews', 'create_crews', 'edit_crews', 'delete_crews']);
        $owner->givePermissionTo(['view_roles', 'create_roles', 'edit_roles']);
        $owner->givePermissionTo(['view_cars', 'create_cars', 'edit_cars', 'delete_cars']);
        $owner->givePermissionTo(['view_customers', 'create_customers', 'edit_customers', 'delete_customers']);
        $owner->givePermissionTo(['view_packages', 'create_packages', 'edit_packages', 'delete_packages']);
        $owner->givePermissionTo(['view_services', 'create_services', 'edit_services', 'delete_services']);
        $owner->givePermissionTo(['view_personalities', 'create_personalities', 'edit_personalities', 'delete_personalities']);
        $owner->givePermissionTo(['view_whatsapps', 'create_whatsapps', 'edit_whatsapps', 'delete_whatsapps']);
        $owner->givePermissionTo(['view_deleted']);
        $owner->givePermissionTo(['view_report']);
        $owner->givePermissionTo(['edit_profile']);
        $owner->givePermissionTo(['restore_deleted']);
        $owner->givePermissionTo(['view_queues', 'create_queues', 'edit_queues', 'reopen_queues', 'both_queues']);

        $manager = Role::create(['name' => 'Manager']);
        $manager->givePermissionTo(['view_cars', 'create_cars', 'edit_cars', 'delete_cars']);
        $manager->givePermissionTo(['view_customers', 'create_customers', 'edit_customers', 'delete_customers']);
        $manager->givePermissionTo(['view_deleted']);
        $manager->givePermissionTo(['view_report']);
        $manager->givePermissionTo(['edit_profile']);
        $manager->givePermissionTo(['view_queues', 'create_queues', 'edit_queues', 'reopen_queues']);

        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(['view_cars', 'create_cars', 'edit_cars', 'delete_cars']);
        $admin->givePermissionTo(['view_customers', 'create_customers', 'edit_customers', 'delete_customers']);
        $admin->givePermissionTo(['view_deleted']);
        $admin->givePermissionTo(['view_queues', 'create_queues', 'edit_queues', 'reopen_queues']);

        $qualityChecker = Role::create(['name' => 'Quality Checker']);
        $qualityChecker->givePermissionTo(['view_queues', 'create_queues', 'edit_queues', 'reopen_queues']);

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
