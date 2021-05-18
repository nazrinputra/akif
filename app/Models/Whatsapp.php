<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{
    use HasFactory;

    public function phone()
    {
        /**
         * Get phone number with 0 at the front with $this->phone().
         */
        return '0' . $this->phone_no;
    }
}
