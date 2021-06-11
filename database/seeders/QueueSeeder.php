<?php

namespace Database\Seeders;

use App\Models\Queue;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get packages and services from database
         * Create queues
         */
        $faker = \Faker\Factory::create('ms_MY');
        $queues = Queue::factory(80)->create()->pluck('id');
        $services = Service::all();

        /**
         * Assign random service to every queues
         */
        foreach ($queues as $queue) {
            $service = $faker->randomElement($services);
            if ($service->custom_price) {
                $custom_price = $faker->randomNumber(4, true);
            } else {
                $custom_price = null;
            }
            DB::table('queue_service')->insert([
                'service_id' => $service->id,
                'queue_id' => $queue,
                'custom_price' => $custom_price,
            ]);
        }
    }
}
