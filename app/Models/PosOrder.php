<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosOrder extends Model
{
    use HasFactory, Multitenantable, Filterable;

    protected $fillable = ['table_id', 'order_date', 'order_status', 'is_order_ended', 'total_amount', 'restaurant_id'];

    public const STATUS = [
        'all' => 'All',
        'created' => 'Created',
        'prepared' => 'Prepared',
        'served' => 'Served',
        'completed' => 'Completed',
    ];

    protected $appends = [
        'grand_total'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Table::class, 'restaurant_id');
    }

    public function orderable_items()
    {
        return $this->hasMany(OrderableItem::class, 'orderable_id');
    }

    public function scopeActiveOrders($query)
    {
        return $query->where('is_order_ended', 0);
    }

    public function getGrandTotalAttribute()
    {
        $orders = OrderableItem::where('orderable_id', $this->getKey())->get();

        $total = 0;

        foreach ($orders as $order) {
            $total = $total + (float)$order->price * (int)$order->quantity;
        }

        return $total;
    }
}
