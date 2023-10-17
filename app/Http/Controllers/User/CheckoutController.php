<?php

namespace App\Http\Controllers\User;

use App\Models\UserCart;
use App\Facades\CartFacade;
use App\Traits\Get_Cookie;
use App\Traits\UpdateQty;
use Illuminate\Http\Request;
use App\Facades\CountryFacade;
use App\Services\CountryService;
use App\Http\Requests\FormAddress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repository\Checkout\OperationsOrder;

class CheckoutController extends Controller
{
    use UpdateQty;
    public function index()
    {
        $cart = UserCart::first();
        $total = CartFacade::price();
        if (!$cart) {
            notify()->error('Not Found Items', "Error");
            return redirect()->route('get_shop');
        }
        $countries = CountryService::get_countries();
        return view('User.Checkout.checkout', compact('cart', 'total', 'countries'));
    }
    public function create(FormAddress $request)
    {
        $operation = new OperationsOrder();
        $order = $operation->create($request);
        foreach (CartFacade::ShowCart()->Products as $product) {
            $this->decrement($product->id, $product->pivot->quantity);
        }
        UserCart::first()->delete();
        notify()->success("Your Order #$order->order_number Success !!", 'Order');
        return redirect()->route('get_shop');
    }
}
