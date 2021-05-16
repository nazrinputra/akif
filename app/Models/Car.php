<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function owners()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function queues()
    {
        return $this->hasMany(Queue::class);
    }
}
