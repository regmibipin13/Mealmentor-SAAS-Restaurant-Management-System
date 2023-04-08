<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\OrderableItem;
use App\Models\PosOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PosOrdersController extends Controller
{
    public function index()
    {
        $data = [
            'activeOrders' => PosOrder::with(['table', 'orderable_items'])->orderBy('id', 'desc')->where('is_order_ended', 0)->paginate(20),
            'pastOrders' => PosOrder::with(['table', 'orderable_items'])->orderBy('id', 'desc')->where('is_order_ended', 1)->paginate(20),
        ];
        return $data;
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required',
            'table_id' => 'required',
            'total' => 'required',
        ]);

        $order = PosOrder::with('orderable_items')->activeOrders()->where('table_id', $request->table_id)->first();

        if ($order !== null) {
            foreach ($request->items as $item) {

                $orderableItems = $order->orderable_items()->where('item_id', $item['id'])->first();
                if ($orderableItems == null) {
                    $orderableItems = new OrderableItem();
                }
                $orderableItems->item_id = $item['id'];
                $orderableItems->quantity = ($orderableItems->quantity ?? 0) + $item['quantity'];
                $orderableItems->price = $item['price'];
                $orderableItems->orderable()->associate($order);
                $orderableItems->save();
            }
            return response()->json(['status' => 'success', 'message' => 'Order Created Successfully']);
        } else {
            $order = PosOrder::create([
                'table_id' => $request->table_id,
                'order_date' => Carbon::now(),
                'order_status' => PosOrder::STATUS['created'],
                'is_order_ended' => 0,
                'total_amount' => $request->total,
                'restaurant_id' => currentRestaurant('api')->id
            ]);
            foreach ($request->items as $item) {
                $orderableItems = new OrderableItem();
                $orderableItems->item_id = $item['id'];
                $orderableItems->quantity = $item['quantity'];
                $orderableItems->price = $item['price'];
                $orderableItems->orderable()->associate($order);
                $orderableItems->save();
            }

            return response()->json(['status' => 'success', 'message' => 'Order Created Successfully']);
        }
    }

    public function update(PosOrder $posOrder, Request $request)
    {
        $request->validate([
            'order_status' => 'required',
        ]);
        if ($request->order_status == PosOrder::STATUS['completed']) {
            $order_ended = 1;
        } else {
            $order_ended = 0;
        }
        $posOrder->update([
            'order_status' => $request->order_status,
            'is_order_ended' => $order_ended
        ]);

        return response()->json(['status' => 'success', 'message' => 'Order Updated Successfully']);
    }

    public function destroy(PosOrder $posOrder)
    {
        $posOrder->delete();
        return response()->json(['status' => 'success', 'message' => 'Order Deleted Successfully']);
    }

    public function remove(PosOrder $posOrder, Request $request)
    {
        $request->validate([
            'item_id' => 'required'
        ]);
        $posOrder->orderable_items()->where('id', $request->item_id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Item Removed Successfully']);
    }
}
