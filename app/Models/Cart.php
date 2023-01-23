<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_amount'];
    protected $with = ['items'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function items()
    {
        return $this->belongsToMany(Item::class, 'cart_items')->withPivot('price', 'quantity')->withTimestamps();
    }
}
