<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    public function get_details_product($id)
    {
        $product = Product::with('Category')->where('id', '=', $id)->first();
        $categories = Category::all();
        $related_products = Product::where('category_id', $product->Category->id)->inRandomOrder()->limit(4)->get();
        return view('User.Product.product_details', compact('product', 'related_products', 'categories'));
    }
}
