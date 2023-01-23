<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory, Filterable, Multitenantable;

    protected $fillable = [
        'name', 'restaurant_id'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
