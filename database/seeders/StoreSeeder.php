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
        Store::create([
            'name' => 'Tambak Bugis',
            'slug' => 'tambak-bugis',
            'phone_no' => '0123456789',
            'location' => "Melaka"
        ]);

        Store::create([
            'name' => 'Bukit Katil',
            'slug' => 'bukit-katil',
            'phone_no' => '0123456789',
            'location' => "Melaka"
        ]);
    }
}
