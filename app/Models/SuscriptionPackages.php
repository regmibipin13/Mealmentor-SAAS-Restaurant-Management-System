<?php


namespace App\Models;


class SuscriptionPackages
{
    public static $packages = [
        1 => [
            'id' => 1,
            'name' => 'Monthly Package',
            'time' => 'monthly',
            'price' => '100',
            'features' => [
                1 => 'Multiple Users To Manage Restaurant',
                2 => 'Full Fledged Dashboard with all the reports',
                3 => 'POS Ordering System with Application'
            ]
        ],
        2 => [
            'id' => 2,
            'name' => 'Yearly Package',
            'time' => 'yearly',
            'price' => '900',
            'features' => [
                1 => 'Multiple Users To Manage Restaurant',
                2 => 'Full Fledged Dashboard with all the reports',
                3 => 'POS Ordering System with Application',
                4 => 'Self QR Ordering System',
                5 => 'Online Ordering System with Frontend Design for customers'
            ]
        ]
    ];
}
