<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\OrderableItem;
use App\Models\PosOrder;
use App\Models\Restaurant;
use App\Models\Table;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $restaurants = Restaurant::all();
        return view('frontend.pages.home', compact('restaurants'));
    }

    public function categories(Request $request)
    {
        $categories = ItemCategory::where('restaurant_id', $request->restaurant_id)->pluck('name', 'id');
        if (!$request->has('restaurant_id') || $request->restaurant_id == null) {
            return abort(404);
        }
        if ($request->has('category') && $request->category !== null) {
            $items = Item::available()->matchRestro($request->restaurant_id)->matchCategory($request)->orderBy('id', 'desc')->get();
        } else {
            $items = Item::available()->matchRestro($request->restaurant_id)->orderBy('id', 'desc')->get();
        }
        return view('frontend.pages.categories', compact('items', 'categories'));
    }

    public function pos(Restaurant $restaurant, Request $request)
    {
        if (!$request->has('table')) {
            return abort(404);
        }
        $categories = ItemCategory::where('restaurant_id', $restaurant->id)->get();
        $tables = Table::where('restaurant_id', $restaurant->id)->get();
        $founded = false;
        foreach ($tables as $table) {
            if (Hash::check($table->id, $request->table)) {
                $founded = true;
                $request->merge(['table_id' => $table->id]);
                $request->merge(['restaurant_id' => $restaurant->id]);
                break;
            }
        }
        if (!$founded || !$request->has('table_id')) {
            return abort(404);
        }

        if ($request->ajax()) {
            $items = Item::where('restaurant_id', $restaurant->id)->with('unit')->filters()->limit(6)->get();
            return response()->json(['items' => $items]);
        }
        return view('frontend.pages.pos', compact('categories', 'tables'));
    }

    public function posDetails(Restaurant $restaurant, Request $request)
    {
        if ($request->ajax()) {
            $items = Item::available()->where('restaurant_id', $restaurant->id)->with('unit')->filters()->limit(6)->get();
            return response()->json(['items' => $items]);
        }
    }

    public function createPosOrder(Restaurant $restaurant, Request $request)
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
                'restaurant_id' => $restaurant->id
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
}
