<?php

namespace Database\Seeders;

use App\Models\Personality;
use Illuminate\Database\Seeder;

class PersonalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ms_MY');

        Personality::create([
            'name' => 'Normal',
            'slug' => 'normal',
            'color' => 'Green',
            'description' => $faker->sentence()
        ]);

        Personality::create([
            'name' => 'Caution',
            'slug' => 'caution',
            'color' => 'Yellow',
            'description' => $faker->sentence()
        ]);

        Personality::create([
            'name' => 'Alert',
            'slug' => 'alert',
            'color' => 'Red',
            'description' => $faker->sentence()
        ]);

        Personality::create([
            'name' => 'Banned',
            'slug' => 'banned',
            'color' => 'Black',
            'description' => $faker->sentence()
        ]);
    }
}
