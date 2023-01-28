<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Item extends Model implements HasMedia
{
    use HasFactory, Filterable, InteractsWithMedia, Multitenantable;

    protected $fillable = ['item_category_id', 'unit_id', 'name', 'price', 'unit_value_of_price', 'special_discount', 'enabled', 'out_of_stock', 'description', 'photo', 'restaurant_id'];


    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function item_category()
    {
        return $this->belongsTo(ItemCategory::class, 'item_category_id');
    }

    public function scopeAvailable($query)
    {
        return $query->where('enabled', 1)->where('out_of_stock', 0);
    }

    public function scopeMatchCategory($query, $request)
    {
        return $query->where('item_category_id', $request->category);
    }
    public function scopeMatchRestro($query, $restaurant_id)
    {
        return $query->where('restaurant_id', $restaurant_id);
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_items')->withPivot('price', 'quantity');
    }
}
