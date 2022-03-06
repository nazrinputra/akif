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
        $waitingTitle = 'Waiting Message';
        $waitingSlug = Str::slug($waitingTitle);
        $waitingMessage = urlencode('Pelanggan yang dihormati, terima kasih kerana memilih AKIF CAR GROOMING CENTRE. Kini anda boleh mengikuti progres kereta anda melalui pautan ini,

https://akif-official.herokuapp.com

__________


Dear valued customers, thank you for choosing AKIF CAR GROOMING CENTRE. You can now follow the progress of your car via this link,

https://akif-official.herokuapp.com');

        $collectedTitle = 'Collected Message';
        $collectedSlug = Str::slug($collectedTitle);
        $collectedMessage = urlencode('Pelanggan yang dihormati, terima kasih kerana memilih AKIF CAR GROOMING CENTRE. Kami berharap anda berpuas hati dengan servis yang diberikan. Sekiranya terdapat sebarang kekurangan, sila maklumkan kepada kami untuk penambahbaikkan.

Anda boleh mengikuti perkembangan dan promosi terkini dari kami melalui pautan Facebook
www.facebook.com/akifcarwash

atau Instagram,
https://www.instagram.com/akif.theofficial/

__________


Dear valued customers, thank you for choosing AKIF CAR GROOMING CENTRE. We sincerely hope you are happy with the services we have provided. Should there be any dissatisfaction with any of the services, please do not hesitate to contact us about it.

You can follow us on Facebook,
www.facebook.com/akifcarwash
or Instagram,
https://www.instagram.com/akif.theofficial/
for the latest information and promotions.');

        $completedTitle = 'Completed Message';
        $completedSlug = Str::slug($completedTitle);
        $completedMessage = urlencode('Kami, AKIF CAR GROOMING CENTRE, ingin memaklumkan kepada anda bahawa kenderaan anda telah disiapkan dan sedia untuk diambil. Sila periksa kenderaan anda dan pastikan tiada barang yang tertinggal sebelum meninggalkan premis kami. Terima kasih.

____________________________


We, AKIF CAR GROOMING CENTER, would like to inform you that your car has been groomed and is ready to be picked up. Please do check that everything in the car is in order and nothing is left behind before leaving our premise. Thank you.');

        $cancelledTitle = 'Cancelled Message';
        $cancelledSlug = Str::slug($cancelledTitle);
        $cancelledMessage = urlencode('Kami ingin meminta maaf sekiranya ada kekurangan pada perkhidmatan kami yang telah menyebabkan anda membatalkan pesanan anda. Kami akan berusaha dan memperbaiki kekurangan dari pihak kami untuk menawarkan perkhidmatan yang lebih baik kepada anda di masa hadapan. Kami harap anda akan datang lagi.

____________________________


We would like to apologise if our service in any way has caused you to cancel your appointment. We will try and improve what is lacking on our part to offer a better service to you in the future. We hope you will come again.');

        Whatsapp::create([
            'title' => $collectedTitle,
            'slug' => $collectedSlug,
            'message' => $collectedMessage
        ]);

        Whatsapp::create([
            'title' => $completedTitle,
            'slug' => $completedSlug,
            'message' => $completedMessage
        ]);

        Whatsapp::create([
            'title' => $cancelledTitle,
            'slug' => $cancelledSlug,
            'message' => $cancelledMessage
        ]);

        Whatsapp::create([
            'title' => $waitingTitle,
            'slug' => $waitingSlug,
            'message' => $waitingMessage
        ]);
    }
}
