<?php

namespace App\Services;

use App\Models\Coupon;
use Carbon\Carbon;

class Couponable
{
    public static function checkCoupon($code, $totalAmount)
    {
        $coupon = Coupon::where('code', $code)->first();
        if ($coupon && static::isValidDate($coupon) && static::checkMinOrderValue($coupon, $totalAmount)) {
            return static::getDiscountDetails($coupon, $totalAmount);
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }

    public static function checkCouponWeb($code, $totalAmount)
    {
        $coupon = Coupon::where('code', $code)->first();
        if ($coupon && static::isValidDate($coupon) && static::checkMinOrderValue($coupon, $totalAmount)) {
            return static::getDiscountDetails($coupon, $totalAmount)['discount_amount'];
        } else {
            return 0;
        }
    }

    public static function isValidDate($coupon)
    {
        $valid_from = Carbon::parse($coupon->valid_from);
        $valid_till = Carbon::parse($coupon->valid_till);

        $now = Carbon::now();


        if ($valid_from->lt($now) && $valid_till->gte($now)) {
            return true;
        }
        return false;
    }

    public static function checkMinOrderValue($coupon, $totalAmount)
    {
        if ($totalAmount >= $coupon->min_order_amount) {
            return true;
        }
        return false;
    }

    public static function getDiscountDetails($coupon, $totalAmount)
    {
        $data = [];
        $totalDiscount = ($coupon->discount_percentage / 100) * $totalAmount;

        $data['discount_percentage'] = $coupon->discount_percentage;
        $data['discount_amount'] = $totalDiscount;

        return $data;
    }
}
