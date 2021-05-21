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
        $packages = Package::all()->pluck('id');

        /**
         * Assign five random services to every package
         */
        foreach ($packages as $package) {
            $services = Service::all()->random(5)->pluck('id');

            foreach ($services as $service) {
                DB::table('package_service')->insert([
                    'package_id' => $package,
                    'service_id' => $service
                ]);
            }
        }
    }
}
