<?php

use App\Models\Restaurant;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

function currentRestaurant($var = 'web')
{
    if ($var == 'api') {
        if (auth('api')->check() && auth('api')->user()->user_type == User::USER_TYPE['restaurant_owner']) {
            return Restaurant::where('user_id', auth('api')->id())->first();
        } else {
            return null;
        }
    }
    if (auth()->check() && auth()->user()->user_type == User::USER_TYPE['restaurant_owner']) {
        return Restaurant::where('user_id', auth()->id())->first();
    }
    return null;
}

function generateQrUrl($table)
{
    $url =  route('frontend.pos.get', $table->restaurant_id) . '?table=' . Hash::make($table->id);
    QrCode::generate($url, public_path('qr-images/') . $table->id . '.svg');

    return QrCode::generate($url);
}

function generateActionButtons($editRoute, $deleteRoute)
{
    $csrf = csrf_token();
    $deleteButton =
        "
            <div class='d-flex align-items-center'>
                <a href='$editRoute' class='btn btn-sm btn-info'>View</a>
                &nbsp;
                <form action='$deleteRoute' method='POST' class='p-0 m-0'>
                    <input type='hidden' name='_token' value='$csrf' />
                    <input type='hidden' name='_method' value='delete' />
                    <button class='btn btn-sm btn-danger' type='submit'>Delete</button>
                </form>
            </div>
        ";

    return $deleteButton;
}
