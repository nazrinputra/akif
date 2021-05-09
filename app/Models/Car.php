<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function queue() {
        return $this->hasMany(Queue::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
