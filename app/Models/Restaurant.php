<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name', 'email', 'address', 'phone', 'min_order_value', 'user_id'
    ];

    protected $with = ['owner'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
