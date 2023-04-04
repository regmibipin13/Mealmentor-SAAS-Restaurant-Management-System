<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckRestaurantOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->user_type == User::USER_TYPE['restaurant_owner']) {
                $sus = currentRestaurant()->suscriptions()->latest()->first();
                if ($sus !== null && $sus->valid_till > Carbon::now() && $sus->verified) {
                    $route = $request->route();
                    $slug = $request->route('slug');

                    if ($slug == currentRestaurant()->slug) {
                        $route->forgetParameter('slug');
                        return $next($request);
                    } else {
                        return abort(404);
                    }
                } else {
                    return response()->view('restaurants.plans');
                }
            } else {
                return abort(404);
            }
        }
        return redirect()->to('/login');
    }
}
