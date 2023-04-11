<?php

namespace App\Observers;

use App\Models\Restaurant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RestaurantObserver
{
    /**
     * Handle the Restaurant "creating" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function creating(Restaurant $restaurant)
    {
        $restaurantOwner = User::create([
            'name' => $restaurant->name,
            'email' => $restaurant->email,
            'password' => Hash::make('password'),
            'phone' => $restaurant->phone,
            'user_type' => User::USER_TYPE['restaurant_owner'],
        ]);
        $restaurantOwner->roles()->sync(collect(Role::all())->map->id->toArray());
        $restaurant->user_id = $restaurantOwner->id;
    }
    /**
     * Handle the Restaurant "created" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function created(Restaurant $restaurant)
    {
        //
    }

    /**
     * Handle the Restaurant "updated" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function updated(Restaurant $restaurant)
    {
        User::find($restaurant->user_id)->update([
            'name' => $restaurant->name,
            'email' => $restaurant->email,
            'password' => request()->password !== null ? Hash::make(request()->password) : $restaurant->owner->password,
            'phone' => $restaurant->phone,
            'user_type' => User::USER_TYPE['restaurant_owner'],
        ]);
    }

    /**
     * Handle the Restaurant "deleted" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function deleted(Restaurant $restaurant)
    {
        User::find($restaurant->user_id)->delete();
    }

    /**
     * Handle the Restaurant "restored" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function restored(Restaurant $restaurant)
    {
        //
    }

    /**
     * Handle the Restaurant "force deleted" event.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return void
     */
    public function forceDeleted(Restaurant $restaurant)
    {
        User::find($restaurant->user_id)->delete();
    }
}
