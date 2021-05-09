<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Queue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Store::create([
            'name' => 'Tambak Bugis',
            'slug' => 'tambak-bugis',
            'address' => "Unknown"
        ]);

        Store::create([
            'name' => 'Bukit Katil',
            'slug' => 'bukit-katil',
            'address' => "Unknown"
        ]);

        Customer::create([
            'name' => 'Ali',
            'phone_no' => '0123456789',
        ]);

        Customer::create([
            'name' => 'Abu',
            'phone_no' => '0123456789',
        ]);

        Customer::create([
            'name' => 'Ahmad',
            'phone_no' => '0123456789',
        ]);

        Car::create([
            'customer_id' => 1,
            'plate_no' => 'ABC1234',
            'brand' => 'Proton',
            'model' => 'Saga',
            'colour' => 'Grey',
            'size' => 'M'
        ]);

        Car::create([
            'customer_id' => 2,
            'plate_no' => 'DEF5678',
            'brand' => 'Perodua',
            'model' => 'Kancil',
            'colour' => 'White',
            'size' => 'S'
        ]);

        Car::create([
            'customer_id' => 3,
            'plate_no' => 'GHI9012',
            'brand' => 'Proton',
            'model' => 'Exora',
            'colour' => 'Black',
            'size' => 'L'
        ]);

        Queue::create([
            'store_id' => 1,
            'car_id' => 1,
            'status' => 'Queuing'
        ]);

        Queue::create([
            'store_id' => 1,
            'car_id' => 2,
            'status' => 'Grooming'
        ]);

        Queue::create([
            'store_id' => 1,
            'car_id' => 3,
            'status' => 'Completed'
        ]);

        Queue::create([
            'store_id' => 2,
            'car_id' => 2,
            'status' => 'Queuing'
        ]);

        Queue::create([
            'store_id' => 2,
            'car_id' => 3,
            'status' => 'Grooming'
        ]);

        Queue::create([
            'store_id' => 2,
            'car_id' => 1,
            'status' => 'Completed'
        ]);
    }
}
