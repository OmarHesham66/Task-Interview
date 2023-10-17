<?php

namespace App\Traits;

use App\Models\Product;

trait UpdateQty
{
    public function decrement($product_id, $qty)
    {
        $product = Product::where('id', $product_id)->first();
        $new_qty = $product->quantity - $qty;
        if ($new_qty == 0) {
            $product->delete();
        }
        $product->update(['quantity' => $new_qty]);
    }
}
