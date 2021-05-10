<?php

namespace Database\Seeders;

use App\Models\Queue;
use Illuminate\Database\Seeder;

class QueueSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

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
