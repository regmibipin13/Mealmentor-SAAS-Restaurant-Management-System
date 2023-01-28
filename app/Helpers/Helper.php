<?php

use App\Models\Restaurant;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

function currentRestaurant()
{
    if (auth()->check() && auth()->user()->user_type == User::USER_TYPE['restaurant_owner']) {
        return Restaurant::where('user_id', auth()->id())->first();
    }
    return null;
}

function generateQrUrl($table)
{
    $url =  url('/restaurants/') . $table->restaurant_id . '/tableOrder=true/tableId=' . $table->id;
    QrCode::generate($url, public_path('qr-images/') . $table->id . '.svg');

    return QrCode::generate($url);
}
