<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Customer::create([
            'id' => 1,
            'name' => 'Ali',
            'phone_no' => '0123456789',
        ]);

        Customer::create([
            'id' => 2,
            'name' => 'Abu',
            'phone_no' => '0123456789',
        ]);

        Customer::create([
            'id' => 3,
            'name' => 'Ahmad',
            'phone_no' => '0123456789',
        ]);
    }
}
