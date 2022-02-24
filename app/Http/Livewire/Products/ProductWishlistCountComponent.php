<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;

class ProductWishlistCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.products.product-wishlist-count-component');
    }
}
