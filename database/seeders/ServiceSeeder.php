<?php

namespace Database\Seeders;

use App\Models\Queue;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
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
        $queues = Queue::all()->pluck('id');
        $services = Service::factory(10)->create()->pluck('id');

        /**
         * Assign random service to every queue
         */
        foreach ($queues as $queue) {
            DB::table('queue_service')->insert([
                'queue_id' => $queue,
                'service_id' => $faker->randomElement($services)
            ]);
        }

        /**
         * Check service which is not selected
         */
        $selected = DB::table('queue_service')->distinct()->pluck('service_id');
        $available = $services->diff($selected);

        /**
         * Assign queue(s) to non selected
         */
        foreach ($available as $missing) {
            DB::table('queue_service')->insert([
                'queue_id' => $faker->randomElement($queues),
                'service_id' => $missing
            ]);
        }
    }
}
