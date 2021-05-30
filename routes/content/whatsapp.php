<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsappController;

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {
        Route::resource('whatsapps', WhatsappController::class)->parameters([
            'whatsapps' => 'whatsapp:slug'
        ])->middleware('auth');

        Route::put('whatsapps/{whatsapp:slug}/restore', [WhatsappController::class, 'restore'])
            ->name('whatsapps.restore')->middleware('auth');

        Route::get('whatsapps/{whatsapp:slug}/send/customers/{customer:slug}', [WhatsappController::class, 'send'])
            ->name('whatsapps.send')->middleware('auth');
    }
);
