<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\ProductCategory;
use Cart;

class ShopLeftNavigationBar extends Component
{

    /**
    * The read all product categories.
    *
    * @return void
    */
    public function readProductCategoryDatabase()
    {
        return ProductCategory::get();
    }

    public function render()
    {
        if (auth()->check()){
            Cart::instance('cart')->restore(auth()->user()->email);
        }

        return view('livewire.products.shop-left-navigation-bar', [
            'productCategories' => $this->readProductCategoryDatabase(),
        ]);
    }
}
