<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Personality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BehaviourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get customers and personalities from database
         */
        $faker = \Faker\Factory::create('ms_MY');
        $customers = Customer::all()->pluck('id');
        $personalities = Personality::all()->pluck('id');

        /**
         * Assign random personality to every customers
         */
        foreach ($customers as $customer) {
            DB::table('customer_personality')->insert([
                'customer_id' => $customer,
                'personality_id' => $faker->randomElement($personalities)
            ]);
        }

        /**
         * Check personality which is not selected
         */
        $selected = DB::table('customer_personality')->distinct()->pluck('personality_id');
        $available = $personalities->diff($selected);

        /**
         * Assign queue(s) to non selected
         */
        foreach ($available as $missing) {
            DB::table('customer_personality')->insert([
                'customer_id' => $faker->randomElement($customers),
                'personality_id' => $missing
            ]);
        }
    }
}
