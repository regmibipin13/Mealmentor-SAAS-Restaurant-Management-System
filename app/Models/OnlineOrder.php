<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineOrder extends Model
{
    use HasFactory, Filterable, Multitenantable;

    protected $fillable = [
        'user_id',
        'address_id',
        'date',
        'amount',
        'discount',
        'delivery_price',
        'payable_amount',
        'payment_method',
        'order_status',
        'restaurant_id'
    ];


    public const STATUS = [
        'all' => 'All',
        'pending' => 'Pending',
        'shipped' => 'Shipped',
        'delivered' => 'Delivered',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function orderable_items()
    {
        return $this->hasMany(OrderableItem::class, 'orderable_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'orderable_id');
    }
}
