<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderableItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function orderable()
    {
        return $this->morphTo();
    }
}
