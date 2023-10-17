<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

trait Get_Cookie
{
    public static function get_cookie($id = 'cart_id')
    {
        $cookie = Cookie::get($id);
        if (!$cookie) {
            $cookie = Str::uuid();
            Cookie::queue($id, $cookie, 60 * 60 * 30);
        }
        return $cookie;
    }
}
