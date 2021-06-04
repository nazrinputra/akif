<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CarSeeder::class,
            PersonalitySeeder::class,
            CustomerSeeder::class,
            BehaviourSeeder::class,
            OwnerSeeder::class,
            StoreSeeder::class,
            PackageSeeder::class,
            ServiceSeeder::class,
            QueueSeeder::class,
            PromotionSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            HealthSeeder::class,
            UserSeeder::class,
            ConditionSeeder::class,
            WhatsappSeeder::class,
        ]);
    }
}
