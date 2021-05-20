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
            $i = 0;
            while ($i < 5) {
                DB::table('package_service')->insert([
                    'package_id' => $package,
                    'service_id' => $faker->randomElement($services)
                ]);
                $i++;
            }
        }
    }
}
