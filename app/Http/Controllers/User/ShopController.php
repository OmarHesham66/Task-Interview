<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function get_shop(Request $request)
    {
        $products = Product::filter($request->query())->paginate(PAGINATE);
        $categories = Category::all();
        return view('User.Shop.shop', compact('products', 'categories'));
    }
}
