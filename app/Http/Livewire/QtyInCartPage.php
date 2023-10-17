<?php

namespace App\Http\Livewire;

use App\Facades\CartFacade;
use Livewire\Component;
use App\Models\UserCart;

class QtyInCartPage extends Component
{

    public function render()
    {
        $cart = UserCart::first();
        if ($cart) {
            $total = CartFacade::price();
            return view('livewire.qty-in-cart-page', compact('cart', 'total'));
        }
        return view('livewire.qty-in-cart-page', compact('cart'));
    }
    public function updateUp($id)
    {
        CartFacade::updateUp(1, $id);
        $this->emit('incermentNumber');
    }
    public function updateDown($id)
    {
        CartFacade::updateDown(1, $id);
        $this->emit('incermentNumber');
    }
    public function delete($id)
    {
        if (UserCart::first()->CartItems->count() == 1) {
            CartFacade::empty();
            return redirect()->route('get_shop');
        } else {
            CartFacade::delete($id);
            $this->emit('incermentNumber');
        }
    }
    public function empty()
    {
        CartFacade::empty();
        return redirect()->route('get_shop');
    }
}
