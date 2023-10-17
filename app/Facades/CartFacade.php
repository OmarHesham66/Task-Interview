<?php

namespace App\Facades;

use App\Repository\Cart\CartRepositroy;
use Illuminate\Support\Facades\Facade;

class CartFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CartRepositroy::class;
    }
}
