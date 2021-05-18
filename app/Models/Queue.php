<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
