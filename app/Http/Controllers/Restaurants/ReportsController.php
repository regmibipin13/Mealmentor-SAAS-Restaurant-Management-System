<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use App\Models\OnlineOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        // Total Order Reports
        $chart_options = [
            'chart_title' => 'Orders',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\OnlineOrder',
            'group_by_field' => 'date',
            'chart_type' => 'line',
            'filter_field' => 'date',
            'range_date_start' => Carbon::parse($request->from_date) ?? '',
            'range_date_end' => Carbon::parse($request->to_date),
            'group_by_period' => $request->report_type ?? 'day',
            'chart_height' => '200px',
            'aggregate_function'  => 'count',
            'date_format' => 'Y M d'
        ];
        $order_reports = new LaravelChart($chart_options);


        // Total Order Values
        $chart_options = [
            'chart_height' => '200px',
            'chart_title' => 'Total Sales',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\OnlineOrder',
            'group_by_field' => 'date',
            'chart_type' => 'bar',
            'filter_field' => 'date',
            'range_date_start' => Carbon::parse($request->from_date) ?? '',
            'range_date_end' => Carbon::parse($request->to_date),
            'group_by_period' => $request->report_type ?? 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'payable_amount',
            'date_format' => 'Y M d'
        ];
        $sales_report = new LaravelChart($chart_options);


        // Total Order By PM
        $chart_options = [
            'chart_height' => '200px',
            'chart_title' => 'Orders By Payment Method',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\OnlineOrder',
            'group_by_field' => 'payment_method',
            'chart_type' => 'pie',
            'filter_field' => 'date',
            'range_date_start' => Carbon::parse($request->from_date) ?? '',
            'range_date_end' => Carbon::parse($request->to_date),
            'group_by_period' => $request->report_type ?? 'day',
            'aggregate_function' => 'count',
            'date_format' => 'Y M d'
        ];
        $order_by_payment_method = new LaravelChart($chart_options);

        // Total Order BY STATUS
        $chart_options = [
            'chart_height' => '200px',
            'chart_title' => 'Orders By Order Status',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\OnlineOrder',
            'group_by_field' => 'order_status',
            'chart_type' => 'pie',
            'filter_field' => 'date',
            'range_date_start' => Carbon::parse($request->from_date) ?? '',
            'range_date_end' => Carbon::parse($request->to_date),
            'group_by_period' => $request->report_type ?? 'day',
            'aggregate_function' => 'count',
            'date_format' => 'Y M d'
        ];
        $order_by_status = new LaravelChart($chart_options);


        $data = [
            'chart1' => $order_reports,
            'chart2' => $sales_report,
            'chart3' => $order_by_payment_method,
            'chart4' => $order_by_status
        ];
        return view('restaurants.reports.index', $data);
    }
}
