<?php

namespace App\Repository\Cart;

use App\Models\Product;
use App\Models\CartItem;
use App\Models\UserCart;
use App\Traits\Get_Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CartRepositroy
{
    use Get_Cookie;
    public function add($quantity, $product_id)
    {
        $item =  UserCart::first();
        if (!$item) {
            DB::beginTransaction();
            try {
                if (Auth::check()) {
                    $cart = UserCart::create([
                        'cookie_id' => $this->get_cookie(),
                        'user_id' => Auth::id()
                    ]);
                } else {
                    $cart = UserCart::create([
                        'cookie_id' => $this->get_cookie(),
                    ]);
                }
                CartItem::create([
                    'product_id' => $product_id,
                    'cart_id' => $cart->id,
                    'quantity' => $quantity,
                ]);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                dd($th->getMessage());
            }
        } elseif (!$cart_items = $item->CartItems()->where('product_id', $product_id)->first()) {
            CartItem::create([
                'product_id' => $product_id,
                'cart_id' => $item->id,
                'quantity' => $quantity,
            ]);
        } else {
            $qty_product = Product::find($product_id)->quantity;
            if ($cart_items->quantity + $quantity > $qty_product) {
                $cart_items->update(['quantity' => $qty_product]);
            } else {
                $cart_items->increment('quantity', $quantity);
            }
        }
    }
    public function updateUp($quantity, $id)
    {
        $cart_item = CartItem::where('id', $id)->first();
        $qty_in_product = $cart_item->Product->quantity;
        if ($cart_item->quantity != $qty_in_product) {
            $cart_item->update(['quantity' => $cart_item->quantity + $quantity]);
        }
    }
    public function updateDown($quantity, $id)
    {
        $cart_item = CartItem::where('id', $id)->first();
        if ($cart_item->quantity > 1) {
            $cart_item->update(['quantity' => $cart_item->quantity - $quantity]);
        }
    }
    public function delete($id)
    {
        CartItem::where('id', $id)->delete();
    }
    public function empty($id = null)
    {
        if ($id != null) {
            UserCart::where('user_id', $id)->delete();
        } else {
            UserCart::where('cookie_id', $this->get_cookie())->delete();
        }
    }
    public function ShowCart()
    {
        return UserCart::with('Products')->first();
    }

    public function price()
    {
        return UserCart::select('cart_items.quantity', 'price')
            ->join('cart_items', 'cart_items.cart_id', '=', 'users_cart.id')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->get()
            ->sum(function ($item) {
                return $item->price * $item->quantity;
            });
    }
    public function ProductNumber()
    {
        return UserCart::first()->CartItems->sum('quantity');
    }
    public function TotalShipingPrice()
    {
        return UserCart::first()->Products()->get()->sum('shiping_price');
    }
}
