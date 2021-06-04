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
         * Assign random health to every users
         */
        foreach ($users as $user) {
            DB::table('health_user')->insert([
                'user_id' => $user,
                'health_id' => $faker->randomElement($healths)
            ]);
        }
    }
}
