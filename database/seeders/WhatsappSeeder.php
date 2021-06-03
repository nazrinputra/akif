<?php

namespace Database\Seeders;

use App\Models\Whatsapp;
use Illuminate\Support\Str;
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
        $completedTitle = 'Completed Message';

        $completedSlug = Str::slug($completedTitle);

        $completedMessage = urldecode('Pelanggan yang dihormati, terima kasih kerana memilih Akif Car Grooming Center. Kami berharap anda berpuas hati dengan servis yang diberikan. Sekiranya terdapat sebarang kekurangan, sila maklumkan kepada kami untuk penambahbaikkan.

Anda boleh mengikuti perkembangan dan promosi terkini dari kami melalui pautan facebook ini, www.facebook.com/akifcarwash

_______

Dear valued customers, thank you for choosing Akif Car Grooming Center. We sincerely hope you are happy with the services we have provided. Should there be any dissatisfaction with any of the services, please do not hesitate to contact us about it.

You can follow us here on facebook, www.facebook.com/akifcarwash , for the latest information and promotions.');

        Whatsapp::create([
            'title' => $completedTitle,
            'slug' => $completedSlug,
            'message' => $completedMessage
        ]);
    }
}
