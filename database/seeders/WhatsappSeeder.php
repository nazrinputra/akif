<?php

namespace Database\Seeders;

use App\Models\Whatsapp;
use Illuminate\Database\Seeder;

class WhatsappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Whatsapp::factory(20)->create();
    }
}
