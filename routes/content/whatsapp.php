<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsappController;

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {
        Route::resource('whatsapps', WhatsappController::class)->parameters([
            'whatsapps' => 'whatsapp:slug'
        ]);

        Route::put('whatsapps/{whatsapp:slug}/restore', [WhatsappController::class, 'restore'])
            ->name('whatsapps.restore');

        Route::get('whatsapps/{whatsapp:slug}/send/customers/{customer:slug}', [WhatsappController::class, 'send'])
            ->name('whatsapps.send');
    }
);
