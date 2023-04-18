<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscription extends Model
{
    use HasFactory, Filterable;

    protected $fillable = ['restaurant_id', 'package_id', 'package_name', 'started_date', 'valid_till', 'amount', 'payment_method', 'payment_ref_id', 'verified'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}
