<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\UserOrder;
use App\Traits\Get_Cookie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    use Get_Cookie;
    public function index()
    {
        if (Auth::check()) {
            $orders = UserOrder::with('OrderItems', 'Shiping')->where('user_id', Auth::id())->get() ?? [];
        } else {
            $orders = UserOrder::with('OrderItems', 'Shiping')->where('cookie_user_id', Get_Cookie::get_cookie('user_id'))->get() ?? [];
        }
        return view('User.MyAccount.my_account', compact('orders'));
    }
    public function show_item($id)
    {
        $items = UserOrder::find($id)->OrderItems;
        return view('User.MyAccount.show_items', compact('items'));
    }
}
