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
            'description' => 'Owner of Akif Car Grooming Center'
        ]);

        Role::create([
            'name' => 'Quality Checker',
            'slug' => 'Quality Checker',
            'description' => 'Quality Checker for Akif Car Grooming Center'
        ]);

        Role::create([
            'name' => 'Detailer',
            'slug' => 'Detailer',
            'description' => 'Detailer for Akif Car Grooming Center'
        ]);

        Role::create([
            'name' => 'Crew',
            'slug' => 'Crew',
            'description' => 'Crew at Akif Car Grooming Center'
        ]);
    }
}
