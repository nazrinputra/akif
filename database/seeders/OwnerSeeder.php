<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Customer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get cars and customers from database
         */
        $faker = Faker::create();
        $cars = Car::all()->pluck('id');
        $customers = Customer::all()->pluck('id');

        /**
         * Assign random owner to every cars
         */
        foreach ($cars as $car) {
            DB::table('car_customer')->insert([
                'car_id' => $car,
                'customer_id' => $faker->randomElement($customers)
            ]);
        }

        /**
         * Check customers who does not own any car
         */
        $owners = DB::table('car_customer')->distinct()->pluck('customer_id');
        $available = $customers->diff($owners);

        /**
         * Assign car(s) to non owner
         */
        foreach ($available as $owner) {
            DB::table('car_customer')->insert([
                'car_id' => $faker->randomElement($cars),
                'customer_id' => $owner
            ]);
        }
    }
}
