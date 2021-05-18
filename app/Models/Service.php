<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function queues()
    {
        return $this->belongsToMany(Queue::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}