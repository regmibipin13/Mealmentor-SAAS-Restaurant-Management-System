<?php

use App\Models\Restaurant;
use App\Models\User;

function currentRestaurant()
{
    if (auth()->check() && auth()->user()->user_type == User::USER_TYPE['restaurant_owner']) {
        return Restaurant::where('user_id', auth()->id())->first();
    }
    return null;
}
