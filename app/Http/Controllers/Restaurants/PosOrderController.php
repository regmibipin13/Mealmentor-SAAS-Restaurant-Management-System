<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\OrderableItem;
use App\Models\PosOrder;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PosOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $items = Item::with('unit')->filters()->limit(6)->get();
            $pendingOrders = PosOrder::with(['table', 'orderable_items'])->orderBy('id', 'desc')->where('is_order_ended', 0)->get();
            return response()->json(['items' => $items, 'pending_orders' => $pendingOrders]);
        }
        $categories = ItemCategory::all();
        $tables = Table::all();
        return view('restaurants.pos.index', compact('categories', 'tables'));
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
                'restaurant_id' => currentRestaurant()->id
            ]);
            foreach ($request->items as $item) {
                $orderableItems = new OrderableItem();
                // $orderableItems->order_id = $order->id;
                $orderableItems->item_id = $item['id'];
                $orderableItems->quantity = $item['quantity'];
                $orderableItems->price = $item['price'];
                $orderableItems->orderable()->associate($order);
                $orderableItems->save();
            }

            return response()->json(['status' => 'success', 'message' => 'Order Created Successfully']);
        }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
