<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\ProductCategory;

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
        return view('livewire.products.shop-left-navigation-bar', [
            'productCategories' => $this->readProductCategoryDatabase(),
        ]);
    }
}
