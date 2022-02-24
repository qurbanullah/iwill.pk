<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;

class ProductCartCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.products.product-cart-count-component');
    }
}
