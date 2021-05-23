<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'phone_no',
        'gender'
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'id', $value)->withTrashed()->firstOrFail();
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
