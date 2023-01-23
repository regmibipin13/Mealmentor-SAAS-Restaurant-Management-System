<?php

namespace App\Traits;

use App\Models\Cart;

trait Cartable
{
    public function getCart()
    {
        return $this->cart;
    }

    public function cartCount()
    {
        return $this->cart->items->count();
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

            if ($this->cart->items()->where('item_id', $itemId)->first() !== null) {
                $this->changeQuantity($itemId, $qty);
            } else {
                $this->updateItemsToCart($itemId, $price, $qty);
            }
        } else {
            $cart = Cart::create([
                'user_id' => $this->getKey(),
                'total_amount' => null,
            ]);

            $cart->items()->sync([$itemId => ['price' => $price, 'quantity' => $qty]]);
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
