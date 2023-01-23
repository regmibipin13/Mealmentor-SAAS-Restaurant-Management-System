<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Restaurant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First Insert Permissions
        if (Permission::all()->count() <= 0) {
            $permissions = [
                [
                    'name' => 'permissions_access'
                ],
                [
                    'name' => 'roles_access'
                ],
                [
                    'name' => 'users_access'
                ],
                [
                    'name' => 'item_categories_access'
                ],
                [
                    'name' => 'units_access'
                ],
                [
                    'name' => 'items_access'
                ],
                [
                    'name' => 'orders_access'
                ],
                [
                    'name' => 'restaurants_access'
                ],

                // Add More Permissions as we go
            ];

            Permission::insert($permissions);
        }


        // Insert Roles
        if (Role::all()->count() <= 0) {
            $role = Role::create([
                'name' => 'Admin'
            ]);
            $role->permissions()->sync(collect(Permission::all())->map->id->toArray());
        }

        if (User::all()->count() <= 0) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'phone' => '0000000000',
                'user_type' => User::USER_TYPE['admin'],
            ]);

            $customer = User::create([
                'name' => 'Customer',
                'email' => 'customer@customer.com',
                'password' => Hash::make('password'),
                'phone' => '2000000000',
                'user_type' => User::USER_TYPE['customer'],
            ]);

            $restaurant = Restaurant::create([
                'name' => 'Restaurant Owner',
                'email' => 'restaurant@restaurant.com',
                'address' => 'Demo Address',
                'phone' => '1000000000',
                // 'user_id' => $restaurantOwner->id
            ]);

            // $admin->roles()->sync(collect(Role::all())->map->id->toArray());
        }
    }
}
