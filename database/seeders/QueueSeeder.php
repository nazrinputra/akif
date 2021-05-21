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
         * Get queues from database and generate services
         */
        $faker = \Faker\Factory::create('ms_MY');
        $services = Service::all()->pluck('id');
        $queues = Queue::factory(40)->create()->pluck('id');

        /**
         * Assign random service to every queue
         */
        foreach ($queues as $queue) {
            DB::table('queue_service')->insert([
                'queue_id' => $queue,
                'service_id' => $faker->randomElement($services)
            ]);
        }
    }
}
