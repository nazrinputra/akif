<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => 'Waiting',
        'remarks' => 'None',
        'move' => 0,
    ];

    protected $fillable = [
        'store_id',
        'car_id',
        'customer_id',
        'status',
        'remarks',
        'move'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->whereHas('car', function ($query) use ($search) {
                $query->where('plate_no', 'like', '%' . $search . '%')
                    ->orWhere('model', 'like', '%' . $search . '%');
            });
        })->when($filters['status'] ?? null, function ($query, $status) {
            if ($status === 'Waiting') {
                $query->where('status', 'Waiting');
            } elseif ($status === 'Grooming') {
                $query->where('status', 'Grooming');
            } elseif ($status === 'Completed') {
                $query->where('status', 'Completed');
            } elseif ($status === 'Collected') {
                $query->where('status', 'Collected');
            } elseif ($status === 'Cancelled') {
                $query->where('status', 'Cancelled');
            } else {
                $query;
            }
        });
    }

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
        return $this->belongsToMany(Package::class)->withPivot('custom_price');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
