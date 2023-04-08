<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderableItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['item_name'];

    public function orderable()
    {
        return $this->morphTo();
    }

    public function getItemNameAttribute()
    {
        return Item::find($this->item_id);
    }
}
