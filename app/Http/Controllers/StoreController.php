<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function show() {
        return view('home', [
            'stores' => Store::all()
        ]);
    }

    public function showOne(Store $store) {
        return view('store', [
            'stores' => Store::all(),
            'store' => $store
        ]);
    }
}
