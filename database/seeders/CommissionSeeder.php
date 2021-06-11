<?php

namespace Database\Seeders;

use App\Models\Commission;
use App\Models\Package;
use App\Models\Queue;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get queues from database
         */
        $faker = \Faker\Factory::create('ms_MY');
        $queues = Queue::all();
        $crews = User::all()->skip(2)->pluck('id');

        /**
         * Assign commission to every queues
         */
        foreach ($queues as $queue) {
            $package = $queue->package;
            if ($package->commission) {
                Commission::create([
                    'user_id' => $faker->randomElement($crews),
                    'claimable_type' => Package::class,
                    'claimable_id' => $package->id,
                    'value' => $package->commission
                ]);
            } else {
                Commission::create([
                    'user_id' => $faker->randomElement($crews),
                    'claimable_type' => Package::class,
                    'claimable_id' => $package->id,
                    'value' => $queue->package_custom_price / 5
                ]);
            }

            foreach ($queue->services as $service) {
                if ($service->commission) {
                    Commission::create([
                        'user_id' => $faker->randomElement($crews),
                        'claimable_type' => Service::class,
                        'claimable_id' => $service->id,
                        'value' => $service->commission
                    ]);
                } else {
                    Commission::create([
                        'user_id' => $faker->randomElement($crews),
                        'claimable_type' => Service::class,
                        'claimable_id' => $service->id,
                        'value' => $service->pivot->custom_price,
                    ]);
                }
            }
        }
    }
}
