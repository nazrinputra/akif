<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => 'Waiting',
    ];

    protected $fillable = [
        'store_id',
        'car_id',
        'customer_id',
        'status',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
