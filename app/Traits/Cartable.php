<?php

namespace App\Traits;

use App\Models\Cart;
use App\Models\Item;

trait Cartable
{
    public function getCart()
    {
        return $this->cart;
    }

    public function cartCount()
    {
        // return $this->cart->items->count();

        $count = 0;

        foreach ($this->cart->items as $item) {
            $count = $count + $item->pivot->quantity;
        }

        return $count;
    }

    public function cartTotal()
    {
        return $this->cart->items->sum('price');
    }

    public function clearCart()
    {
        $this->cart->delete();
    }

    public function addToCart($itemId, $qty = 1, $price = 0)
    {
        if ($this->cart()->exists()) {
            if (count($this->cart->items) > 0 && $this->cart->items->first()->restaurant_id !== Item::find($itemId)->restaurant_id) {
                return response()->json(['status' => 'error', 'message' => 'You cannot add items from multiple restaurants']);
            }
            if ($this->cart->items()->where('item_id', $itemId)->first() !== null) {
                $this->changeQuantity($itemId, $qty);
                return response()->json(['status' => 'error', 'message' => 'Item Already Exist in Cart']);
            } else {
                $this->updateItemsToCart($itemId, $price, $qty);
                return response()->json(['status' => 'success', 'message' => 'Item Added in Cart']);
            }
        } else {
            $cart = Cart::create([
                'user_id' => $this->getKey(),
                'total_amount' => null,
            ]);

            $cart->items()->sync([$itemId => ['price' => $price, 'quantity' => $qty]]);

            return response()->json(['status' => 'success', 'message' => 'Item Added in Cart']);
        }
    }

    public function updateItemsToCart($itemId, $price, $qty)
    {
        $this->cart->items()->attach([$itemId => ['price' => $price, 'quantity' => $qty]]);
    }

    public function changeQuantity($itemId, $qty)
    {
        $this->cart->items()->where('item_id', $itemId)->update(['quantity' => $qty]);
    }
    public function removeFromCart($itemId)
    {
        $this->cart->items()->detach($itemId);
    }
}
