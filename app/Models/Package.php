<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'frequency',
        'duration',
        'description'
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'id', $value)->withTrashed()->firstOrFail();
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
