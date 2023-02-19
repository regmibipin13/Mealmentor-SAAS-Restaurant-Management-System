<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OnlineOrdersDataTable;
use App\Http\Controllers\Controller;
use App\Models\OnlineOrder;
use Illuminate\Http\Request;

class OnlineOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OnlineOrdersDataTable $dataTable)
    {
        return $dataTable->render('admin.online-orders.index');
        // $orders = OnlineOrder::filters()->orderBy('id', 'desc')->paginate(20);
        // return view('admin.online-orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        $order = OnlineOrder::find($orderId);
        $order->load(['orderable_items']);
        return view('admin.online-orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnlineOrder $onlineOrder)
    {
        $onlineOrder->update([
            'order_status' => $request->order_status,
        ]);

        return redirect()->back()->with('success', 'Order Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnlineOrder $onlineOrder)
    {
        $onlineOrder->delete();
        return redirect()->back()->with('success', 'Order Deleted Successfully');
    }
}
