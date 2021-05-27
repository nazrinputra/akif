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
         * Assign random queue to every packages
         */
        foreach ($packages as $package) {
            DB::table('package_queue')->insert([
                'package_id' => $package,
                'queue_id' => $faker->randomElement($queues)
            ]);
        }

        /**
         * Assign random queue to every services
         */
        foreach ($services as $service) {
            DB::table('queue_service')->insert([
                'service_id' => $service,
                'queue_id' => $faker->randomElement($queues)
            ]);
        }
    }
}
