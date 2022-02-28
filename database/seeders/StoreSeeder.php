<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ms_MY');

        Store::create([
            'name' => 'Bukit Katil',
            'slug' => 'bukit-katil',
            'phone_no' => $faker->fixedLineNumber(false, false),
            'location' => $faker->address()
        ]);
    }
}
