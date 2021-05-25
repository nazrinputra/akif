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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('plate_no', 'like', '%' . $search . '%')
                ->orWhere('model', 'like', '%' . $search . '%');
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            } else {
                $query;
            }
        });
    }

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
