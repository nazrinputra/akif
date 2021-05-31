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
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Owner']);
        Role::create(['name' => 'Crew']);
        Role::create(['name' => 'Detailer']);
        Role::create(['name' => 'Quality Checker']);
        Role::create(['name' => 'Super Admin'])->givePermissionTo(Permission::all());
    }
}
