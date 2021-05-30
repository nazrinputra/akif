<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ms_MY');
        $stores = Store::all()->pluck('id');

        User::create([
            'id' => 1,
            'name' => 'Admin',
            'store_id' => $faker->randomElement($stores),
            'slug' => 'admin',
            'phone_no' => '0123456789',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$R5fmLgPcuHt7OVogqqNEWurkIjZL.kIOwd.wjrfGGvG1wYi2xLxMi', // password
        ])->assignRole('Super Admin');

        User::create([
            'id' => 2,
            'name' => 'Akif',
            'store_id' => $faker->randomElement($stores),
            'slug' => 'akif',
            'phone_no' => '0129876543',
            'email' => 'akif@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$R5fmLgPcuHt7OVogqqNEWurkIjZL.kIOwd.wjrfGGvG1wYi2xLxMi', // password
        ])->assignRole('Admin');

        $users = User::factory(48)->create();

        $roles = Role::all()->skip(3);
        foreach ($users as $user) {
            $user->assignRole($faker->randomElement($roles));
        }
    }
}
