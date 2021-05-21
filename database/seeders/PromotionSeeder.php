<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get services and packages from database
         */
        $faker = \Faker\Factory::create('ms_MY');
        $services = Service::all()->pluck('id');
        $packages = Package::all()->pluck('id');

        /**
         * Assign random service to every package
         */
        foreach ($packages as $package) {
            DB::table('package_service')->insert([
                'package_id' => $package,
                'service_id' => $faker->randomElement($services)
            ]);
        }

        /**
         * Check service which is not selected
         */
        $selected = DB::table('package_service')->distinct()->pluck('service_id');
        $available = $services->diff($selected);

        /**
         * Assign package(s) to non selected
         */
        foreach ($available as $missing) {
            DB::table('queue_service')->insert([
                'queue_id' => $faker->randomElement($packages),
                'service_id' => $missing
            ]);
        }
    }
}
