<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->user_type == User::USER_TYPE['admin'] ? true : $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }

        //Blade directives
        Blade::directive('role', function ($role) {
            return "if(auth()->check() && auth()->user()->hasRole({$role})) :"; //return this if statement inside php tag
        });

        Blade::directive('endrole', function ($role) {
            return "endif;"; //return this endif statement inside php tag
        });
    }
}
