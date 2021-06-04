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
            'name' => 'High blood pressure',
            'slug' => 'high-blood-pressure',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Low blood pressure',
            'slug' => 'low-blood-pressure',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Heart disease',
            'slug' => 'heart disease',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Asthma',
            'slug' => 'asthma',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Diabetes',
            'slug' => 'diabetes',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Skin disease',
            'slug' => 'skin-disease',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Allergy',
            'slug' => 'allergy',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Migraine',
            'slug' => 'migraine',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Cancer',
            'slug' => 'cancer',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Hernia',
            'slug' => 'hernia',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Myopia',
            'slug' => 'myopia',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Astigmatisms',
            'slug' => 'astigmatisms',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Neck injury',
            'slug' => 'neck-injury',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Back injury',
            'slug' => 'back-injury',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Broken bone',
            'slug' => 'broken-bone',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Deaf',
            'slug' => 'deaf',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Mute',
            'slug' => 'mute',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'HIV',
            'slug' => 'hiv',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Sinusitis',
            'slug' => 'sinusitis',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Alcohol user',
            'slug' => 'alcohol-user',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Drug user',
            'slug' => 'drug-user',
            'description' => $faker->sentence()
        ]);

        Health::create([
            'name' => 'Smoker',
            'slug' => 'smoker',
            'description' => $faker->sentence()
        ]);
    }
}
