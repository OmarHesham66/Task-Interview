<?php

namespace App\Http\Livewire;

use App\Facades\CartFacade;
use Livewire\Component;

class BtnAddCart extends Component
{
    public $product, $qty;

    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.btn-add-cart');
    }
    public function save()
    {
        if ($this->qty == null) {
            $this->qty = 1;
        }
        CartFacade::add($this->qty, $this->product->id);
        $this->emit('incermentNumber');
    }
}
