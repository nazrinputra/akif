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
        $owner->givePermissionTo(['create_crews', 'edit_crews', 'delete_crews']);
        $owner->givePermissionTo(['create_roles', 'edit_roles']);
        $owner->givePermissionTo(['create_cars', 'edit_cars', 'delete_cars']);
        $owner->givePermissionTo(['create_customers', 'edit_customers', 'delete_customers']);
        $owner->givePermissionTo(['create_packages', 'edit_packages', 'delete_packages']);
        $owner->givePermissionTo(['create_services', 'edit_services', 'delete_services']);
        $owner->givePermissionTo(['create_personalities', 'edit_personalities', 'delete_personalities']);
        $owner->givePermissionTo(['create_whatsapps', 'edit_whatsapps', 'delete_whatsapps']);
        $owner->givePermissionTo(['view_deleted']);
        $owner->givePermissionTo(['restore_deleted']);
        $owner->givePermissionTo(['create_queues', 'edit_queues', 'reopen_queues']);

        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(['create_cars', 'edit_cars', 'delete_cars']);
        $admin->givePermissionTo(['create_customers', 'edit_customers', 'delete_customers']);
        $admin->givePermissionTo(['create_packages', 'edit_packages', 'delete_packages']);
        $admin->givePermissionTo(['create_services', 'edit_services', 'delete_services']);
        $admin->givePermissionTo(['create_personalities', 'edit_personalities', 'delete_personalities']);
        $admin->givePermissionTo(['create_whatsapps', 'edit_whatsapps', 'delete_whatsapps']);
        $admin->givePermissionTo(['view_deleted']);
        $admin->givePermissionTo(['create_queues', 'edit_queues', 'reopen_queues']);

        $crew = Role::create(['name' => 'Crew']);
        $crew->givePermissionTo(['create_cars', 'edit_cars', 'delete_cars']);
        $crew->givePermissionTo(['create_customers', 'edit_customers', 'delete_customers']);
        $crew->givePermissionTo(['create_personalities', 'edit_personalities', 'delete_personalities']);
        $crew->givePermissionTo(['create_whatsapps', 'edit_whatsapps', 'delete_whatsapps']);
        $crew->givePermissionTo(['create_queues', 'edit_queues']);

        Role::create(['name' => 'Quality Checker']);
        Role::create(['name' => 'Detailer']);
        Role::create(['name' => 'Super Admin'])->givePermissionTo(Permission::all());
    }
}
