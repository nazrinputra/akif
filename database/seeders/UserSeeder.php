<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'phone_no' => '0123456789',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$R5fmLgPcuHt7OVogqqNEWurkIjZL.kIOwd.wjrfGGvG1wYi2xLxMi', // password
        ]);
    }
}
