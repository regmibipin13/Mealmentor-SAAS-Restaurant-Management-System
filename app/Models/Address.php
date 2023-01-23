<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'city', 'street', 'nearby_landmark'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
