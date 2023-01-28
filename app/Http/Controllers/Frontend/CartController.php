<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OnlineOrder;
use App\Models\OrderableItem;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = auth()->user()->getCart();
        if ($request->ajax()) {
            return $cart;
        }
        return view('user.carts.cart');
    }

    public function cartCount()
    {
        $cartCount = auth()->user()->cartCount();
        return $cartCount;
    }



    public function addToCart(Request $request)
    {
        $sanitized = $request->validate([
            'item_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        return auth()->user()->addToCart($sanitized['item_id'], $sanitized['quantity'], $sanitized['price']);
        // return response()->json(['status' => 'success']);
    }

    public function changeQuantity(Request $request)
    {
        $sanitized = $request->validate([
            'item_id' => 'required',
            'quantity' => 'required',
        ]);
        auth()->user()->changeQuantity($sanitized['item_id'], $sanitized['quantity']);
        return response()->json(['status' => 'success']);
    }
    public function removeFromCart(Request $request)
    {
        $sanitized = $request->validate([
            'item_id' => 'required',
        ]);
        auth()->user()->removeFromCart($sanitized['item_id']);
        return response()->json(['status' => 'success']);
    }

    public function success(Request $request)
    {
        if ($request->has('order_id') && $request->order_id !== null) {
            $order = OnlineOrder::find($request->order_id);
            $payment = new Payment();
            $payment->payment_method = $order->payment_method;
            $payment->payment_status = "success";
            $payment->amount = $order->payable_amount;
            $payment->response = json_encode($request->all());
            $payment->orderable()->associate($order);
            $payment->save();
            return view('user.carts.order_success', compact('order'));
        }
        return redirect()->to('/home');
    }

    public function order(Request $request)
    {
        $request->validate([
            'items' => 'required',
            'address_id' => 'required',
            'payment_method' => 'required',
            'restaurant_id' => 'required',
        ]);

        $order = OnlineOrder::create([
            'user_id' => auth()->id(),
            'address_id' => $request->address_id,
            'payable_amount' => $request->payable_amount,
            'amount' => $request->payable_amount,
            'date' => Carbon::now(),
            'payment_method' => $request->payment_method,
            'restaurant_id' => $request->restaurant_id,
        ]);
        foreach ($request->items as $item) {
            $orderableItems = new OrderableItem();
            // $orderableItems->order_id = $order->id;
            $orderableItems->item_id = $item['id'];
            $orderableItems->quantity = $item['pivot']['quantity'];
            $orderableItems->price = $item['pivot']['price'];
            $orderableItems->orderable()->associate($order);
            $orderableItems->save();
        }

        auth()->user()->clearCart();

        return $order;
    }
}
