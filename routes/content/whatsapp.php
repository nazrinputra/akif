<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsappController;

Route::resource('whatsapps', WhatsappController::class)->parameters([
    'whatsapps' => 'whatsapp:slug'
])->middleware('auth');

Route::put('whatsapps/{whatsapp:slug}/restore', [WhatsappController::class, 'restore'])
    ->name('whatsapps.restore')->middleware('auth');
