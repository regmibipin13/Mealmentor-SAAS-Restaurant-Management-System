<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Suscribable;
use Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Cviebrock\EloquentSluggable\Sluggable;

class Restaurant extends Model implements HasMedia
{
    use HasFactory, Filterable, InteractsWithMedia, Suscribable, Sluggable;

    protected $fillable = [
        'name', 'email', 'address', 'phone', 'min_order_value', 'user_id', 'slug'
    ];

    protected $with = ['owner'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function suscriptions()
    {
        return $this->hasMany(Suscription::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeFilter($query, $request)
    {
        if ($request->has('restaurant')) {
            $query->where('name', 'like', '%' . $request->restaurant . '%')
                ->orWhere('address', 'like', '%' . $request->restaurant . '%');
        }
        return $query;
    }
}
