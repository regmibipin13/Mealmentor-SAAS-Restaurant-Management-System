<?php

namespace Database\Seeders;

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
        if (User::all()->count() <= 0) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'phone' => '0000000000',
                'is_admin_side' => 1,
            ]);

            $customer = User::create([
                'name' => 'Customer',
                'email' => 'customer@customer.com',
                'password' => Hash::make('password'),
                'phone' => '1000000000',
                'is_admin_side' => 0,
            ]);
        }
    }
}
