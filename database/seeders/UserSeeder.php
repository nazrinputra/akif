<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Seeder;

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
        $admin = Role::where('name', 'Administrator')->first();

        User::create([
            'name' => 'Admin',
            'role_id' => $admin->id,
            'store_id' => $faker->randomElement($stores),
            'slug' => 'admin',
            'phone_no' => '0123456789',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$R5fmLgPcuHt7OVogqqNEWurkIjZL.kIOwd.wjrfGGvG1wYi2xLxMi', // password
        ]);

        User::factory(49)->create();
    }
}
