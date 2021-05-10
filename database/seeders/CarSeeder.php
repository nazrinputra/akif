<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Car::create([
            'id' => 1,
            'customer_id' => 1,
            'plate_no' => 'ABC1234',
            'brand' => 'Proton',
            'model' => 'Saga',
            'colour' => 'Grey',
            'size' => 'M'
        ]);

        Car::create([
            'id' => 2,
            'customer_id' => 2,
            'plate_no' => 'DEF5678',
            'brand' => 'Perodua',
            'model' => 'Kancil',
            'colour' => 'White',
            'size' => 'S'
        ]);

        Car::create([
            'id' => 3,
            'customer_id' => 3,
            'plate_no' => 'GHI9012',
            'brand' => 'Proton',
            'model' => 'Exora',
            'colour' => 'Black',
            'size' => 'L'
        ]);
    }
}
