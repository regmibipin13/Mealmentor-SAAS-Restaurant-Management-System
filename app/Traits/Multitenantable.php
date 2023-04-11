<?php

namespace App\Traits;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Multitenantable
{
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
    protected static function bootMultitenantable()
    {
        if (auth()->check()) {
            if (auth()->user()->user_type == User::USER_TYPE['restaurant_owner']) {
                static::creating(function ($model) {
                    $model->restaurant_id = currentRestaurant()->id;
                });
                static::addGlobalScope('restaurant_id', function (Builder $builder) {
                    return $builder->where('restaurant_id', currentRestaurant()->id);
                });
            } elseif (auth()->user()->user_type == User::USER_TYPE['admin']) {
                static::creating(function ($model) {
                    $model->restaurant_id = request()->restaurant_id;
                });
            }
        }

        if (auth('api')->check()) {
            if (auth('api')->user()->user_type == User::USER_TYPE['restaurant_owner']) {
                static::creating(function ($model) {
                    $model->restaurant_id = currentRestaurant('api')->id;
                });
                static::addGlobalScope('restaurant_id', function (Builder $builder) {
                    return $builder->where('restaurant_id', currentRestaurant('api')->id);
                });
            } elseif (auth('api')->user()->user_type == User::USER_TYPE['admin']) {
                static::creating(function ($model) {
                    $model->restaurant_id = request()->restaurant_id;
                });
            }
        }
    }
}
