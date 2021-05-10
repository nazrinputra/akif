<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Queue;
use App\Models\Service;
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
            'id' => 1,
            'name' => 'Tambak Bugis',
            'slug' => 'tambak-bugis',
            'address' => "Unknown"
        ]);

        Store::create([
            'id' => 2,
            'name' => 'Bukit Katil',
            'slug' => 'bukit-katil',
            'address' => "Unknown"
        ]);

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

        Service::create([
            'id' => 1,
            'title' => 'Service 1',
            'price' => 'RM1',
            'duration' => '1 hour',
            'frequency' => 'Every day',
            'package' => 'Wash and Vacuum',
            'details' => 'Good service choice'
        ]);

        Queue::create([
            'id' => 1,
            'store_id' => 1,
            'car_id' => 1,
            'service_id' => 1,
            'status' => 'Queuing'
        ]);

        Queue::create([
            'id' => 2,
            'store_id' => 1,
            'car_id' => 2,
            'service_id' => 1,
            'status' => 'Grooming'
        ]);

        Queue::create([
            'id' => 3,
            'store_id' => 1,
            'car_id' => 3,
            'service_id' => 1,
            'status' => 'Completed'
        ]);

        Queue::create([
            'id' => 4,
            'store_id' => 2,
            'car_id' => 2,
            'service_id' => 1,
            'status' => 'Queuing'
        ]);

        Queue::create([
            'id' => 5,
            'store_id' => 2,
            'car_id' => 3,
            'service_id' => 1,
            'status' => 'Grooming'
        ]);

        Queue::create([
            'id' => 6,
            'store_id' => 2,
            'car_id' => 1,
            'service_id' => 1,
            'status' => 'Completed'
        ]);
    }
}
