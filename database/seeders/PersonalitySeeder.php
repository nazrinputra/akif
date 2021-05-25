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
        Personality::factory(15)->create();
    }
}
