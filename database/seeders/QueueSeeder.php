<?php

namespace Database\Seeders;

use App\Models\Queue;
use App\Models\Package;
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
        $packages = Package::all()->pluck('id');
        $services = Service::all()->pluck('id');

        /**
         * Assign random service to every queues
         */
        foreach ($queues as $queue) {
            DB::table('queue_service')->insert([
                'service_id' => $faker->randomElement($services),
                'queue_id' => $queue
            ]);
        }

        /**
         * Assign random queue to every packages three times
         */
        foreach ($packages as $package) {
            for ($i = 0; $i < 3; $i++) {
                DB::table('package_queue')->insert([
                    'package_id' => $package,
                    'queue_id' => $faker->randomElement($queues)
                ]);
            }
        }
    }
}
