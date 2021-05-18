<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
            'description' => 'Administrator for the system'
        ]);

        Role::create([
            'name' => 'Owner',
            'slug' => 'owner',
            'description' => 'Owner of Akif'
        ]);

        Role::create([
            'name' => 'Worker',
            'slug' => 'worker',
            'description' => 'Worker at Akif'
        ]);
    }
}
