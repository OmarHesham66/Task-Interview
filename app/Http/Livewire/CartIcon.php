<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Facades\CartFacade;
use App\Models\CartItem;

class CartIcon extends Component
{
    public $number, $cart, $total;
    protected $listeners = ['incermentNumber' => '$refresh'];

    public function render()
    {
        $this->cart = CartFacade::ShowCart();
        $this->total = CartFacade::price();
        $this->number = (!$this->cart) ?  0 : CartFacade::ProductNumber();
        return view('livewire.cart-icon');
    }
    public function delete($id)
    {
        CartFacade::delete($id);
    }
}
