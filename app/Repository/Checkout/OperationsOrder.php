<?php

namespace App\Repository\Checkout;

use App\Models\Shiping;
use App\Models\UserCart;
use App\Models\OrderItem;
use App\Models\UserOrder;
use App\Facades\CartFacade;
use App\Traits\Get_Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class OperationsOrder implements IOrder
{
    use Get_Cookie;
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $order = UserOrder::create([
                'user_id' => Auth::id(),
                'cookie_user_id' => Get_Cookie::get_cookie('user_id'),
                'status_order' => 'pending',
                'Vat' => CartFacade::price() * 0.14,
                'shiping_price' => CartFacade::TotalShipingPrice(),
                'discount' => (count($this->CheckingOffers()) > 0) ? json_encode($this->CheckingOffers()) : null,
                'total_price' => CartFacade::price()
            ]);
            foreach (CartFacade::ShowCart()->Products as $value) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $value->id,
                    'product_name' => $value->name,
                    'quantity' => $value->pivot->quantity,
                    'price' => $value->price,
                ]);
            }
            Shiping::create([
                'first_name' => $request['address']['first_name'],
                'last_name' => $request['address']['last_name'],
                'order_id' => $order->id,
                'address_name' => $request['address']['address_name'],
                'country' => $request['address']['country'],
                'city' => $request['address']['city'],
                'state' => $request['address']['state'],
                'phone_number' => $request['address']['phone_number'],
                'email' => $request['address']['email'],
            ]);
            DB::commit();
            return $order;
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }
    public function CheckingOffers()
    {
        $cart = UserCart::first();
        $discount = [];
        $shoes_offer = 0;
        if (CartFacade::ProductNumber() >= 2) {
            $discount['$10 of shipping'] = 10;
        }
        if ($cart->HasProduct('Blouse') && $cart->HasProduct('T-Shirt') && $cart->HasProduct('Jacket')) {
            $discount['50% off jacket'] = $cart->GetProduct('Jacket')->first()->price / 2;
        }
        if ($cart->GetProduct('Shoes')->first()) {
            foreach ($cart->GetProduct('Shoes')->get() as $shoes) {
                $shoes_offer = $shoes_offer + ($shoes->price * 0.10);
            }
            $discount['10% off shoes'] = $shoes_offer;
        }
        return $discount;
    }
}
