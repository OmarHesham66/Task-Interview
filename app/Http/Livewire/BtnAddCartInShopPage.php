<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Facades\CartFacade;

class BtnAddCartInShopPage extends Component
{
    public $product;
    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.btn-add-cart-in-shop-page');
    }
    public function add()
    {
        CartFacade::add(1, $this->product->id);
        $this->emit('incermentNumber');
    }
}
