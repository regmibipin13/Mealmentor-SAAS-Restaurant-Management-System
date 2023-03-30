<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'desc')->paginate(20);
        return view('restaurants.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'name' => ['required', 'unique:coupons'],
            'code' => ['required', 'unique:coupons'],
            'valid_from' => ['required'],
            'valid_till' => ['required'],
            'discount_percentage' => ['required'],
            'min_order_amount' => ['required'],
        ]);

        if ($request->has('enabled') && $request->enabled == "on") {
            $sanitized['is_enabled'] = 1;
        } else {
            $sanitized['is_enabled'] = 0;
        }

        Coupon::create($sanitized);

        return redirect()->route('restaurants.coupons.index', [currentRestaurant()->slug ?? uniqid()])->with('success', 'Coupons Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('restaurants.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $sanitized = $request->validate([
            'name' => ['required', 'unique:coupons,name,' . $coupon->id],
            'code' => ['required', 'unique:coupons,code,' . $coupon->id],
            'valid_from' => ['required'],
            'valid_till' => ['required'],
            'discount_percentage' => ['required'],
            'min_order_amount' => ['required'],
        ]);

        if ($request->has('enabled') && $request->enabled == "on") {
            $sanitized['is_enabled'] = 1;
        } else {
            $sanitized['is_enabled'] = 0;
        }

        $coupon->update($sanitized);

        return redirect()->route('restaurants.coupons.index', [currentRestaurant()->slug ?? uniqid()])->with('success', 'Coupons Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->back()->with('success', 'Coupons Deleted Successfully');
    }
}
