<?php

namespace App\Http\Controllers\Restaurants;

use App\DataTables\PosOrdersDataTable;
use App\Http\Controllers\Controller;
use App\Models\PosOrder;
use Illuminate\Http\Request;

class PosOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PosOrdersDataTable $dataTable)
    {
        return $dataTable->render('restaurants.pos-orders.index');
        // $orders = PosOrder::filters()->orderBy('id', 'desc')->paginate(20);
        // return view('restaurants.pos-orders.index', compact('orders'));
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
        $order = PosOrder::find($orderId);
        $order->load(['orderable_items']);
        return view('restaurants.pos-orders.show', compact('order'));
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
    public function update(Request $request, PosOrder $posOrder)
    {
        if ($request->order_status == PosOrder::STATUS['completed']) {
            $order_ended = 1;
        } else {
            $order_ended = 0;
        }
        $posOrder->update([
            'order_status' => $request->order_status,
            'is_order_ended' => $order_ended
        ]);

        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'message' => 'Order Updated Successfully']);
        }

        return redirect()->back()->with('success', 'Order Updated Successfully');
    }

    public function remove(PosOrder $posOrder, Request $request)
    {
        $request->validate([
            'item_id' => 'required'
        ]);
        $posOrder->orderable_items()->where('id', $request->item_id)->delete();
        return redirect()->back()->with('success', 'Item Removed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PosOrder $posOrder)
    {
        $posOrder->delete();
        return redirect()->back()->with('success', 'Order Deleted Successfully');
    }
}
