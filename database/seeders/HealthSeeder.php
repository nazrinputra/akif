<?php

namespace Database\Seeders;

use App\Models\Health;
use Illuminate\Database\Seeder;

class HealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ms_MY');

        Health::create([
            'name' => 'Asthma',
            'slug' => 'asthma',
            'description' => $faker->sentence()
        ]);

        //TODO add more from the form
    }
}
