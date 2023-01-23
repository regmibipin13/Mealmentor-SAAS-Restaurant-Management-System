<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Multitenantable
{
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
            }
        }
    }
}
