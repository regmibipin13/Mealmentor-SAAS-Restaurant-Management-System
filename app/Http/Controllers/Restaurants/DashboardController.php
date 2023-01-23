<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use App\Models\OnlineOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $orders = (new OnlineOrder)->newQuery();

        if ($request->has('from_date') && $request->has('to_date')) {
            $orders->whereBetween('date', [Carbon::parse($request->from_date), Carbon::parse($request->to_date)]);
        }

        if ($request->has('order_status') && $request->order_status !== 'all') {
            $orders->where('order_status', $request->order_status);
        }


        if ($request->has('payment_method') && $request->payment_method !== 'all') {
            $orders->where('payment_method', $request->payment_method);
        }

        if ($request->has('restaurant_id') && $request->restaurant_id !== 'all') {
            $orders->where('restaurant_id', $request->restaurant_id);
        }

        $ordersCount = $orders->count();

        $orders = $orders->get();

        $onlineOrdersPieOptions = [
            'chart_title' => 'Orders',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\OnlineOrder',
            'group_by_field' => 'date',
            'chart_type' => 'bar',
            'filter_field' => 'date',
            'range_date_start' => Carbon::parse($request->from_date),
            'range_date_end' => Carbon::parse($request->to_date),
            'group_by_period' => 'day',
            'chart_height' => '200px'
        ];
        $onlineOrdersPie = new LaravelChart($onlineOrdersPieOptions);


        $data = [
            'orders_count' => $ordersCount,
            'orders' => $orders,
            'chart1' => $onlineOrdersPie,
        ];
        return view('restaurants.dashboard', $data);
    }
}
