<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use
        HasFactory,
        SoftDeletes;

    protected $fillable = [
        'plate_no',
        'slug',
        'brand',
        'model',
        'color',
        'size'
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'id', $value)->withTrashed()->firstOrFail();
    }

    public function owners()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function queues()
    {
        return $this->hasMany(Queue::class);
    }
}
