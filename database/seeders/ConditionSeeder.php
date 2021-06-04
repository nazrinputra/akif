<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Health;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get users and healths from database
         */
        $faker = \Faker\Factory::create('ms_MY');
        $users = User::all()->pluck('id');
        $healths = Health::all()->pluck('id');

        /**
         * Assign random users to every health
         */
        foreach ($healths as $health) {
            DB::table('health_user')->insert([
                'health_id' => $health,
                'user_id' => $faker->randomElement($users)
            ]);
        }
    }
}
