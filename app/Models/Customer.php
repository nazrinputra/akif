<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function phone()
    {
        /**
         * Get phone number with 0 at the front with $this->phone().
         */
        return '0' . $this->phone_no;
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }

    public function personalities()
    {
        return $this->belongsToMany(Personality::class);
    }
}
