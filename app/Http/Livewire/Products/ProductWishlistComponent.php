<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Cart;

class ProductWishlistComponent extends Component
{
    /**
    * The add product to cart function.
    *
    * @return void
    */
    public function MoveProductFromWishlistToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('products.cart-count-component', 'refreshComponent');
        $this->emitTo('products.product-wishlist-count-component', 'refreshComponent');
        $this->emitTo('products.product-cart-count-component', 'refreshComponent');
    }

    /**
    * The add product to cart function.
    *
    * @return void
    */
    public function RemoveProductFromWishList($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witems){
            if($witems->id == $product_id){
                Cart::instance('wishlist')->remove($witems->rowId);
                $this->emitTo('products.product-wishlist-count-component', 'refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        return view('livewire.products.product-wishlist-component');
    }
}
