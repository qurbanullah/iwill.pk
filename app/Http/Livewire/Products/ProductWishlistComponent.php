<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Exception;
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
        try{
            Cart::instance('wishlist')->remove($rowId);
            Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');

            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Product Moved from Wishlist to Cart.']);
        }catch(Exception $e){
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Error Moving Product from Wishlist to Cart.']);
        }

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
                try{
                    Cart::instance('wishlist')->remove($witems->rowId);
                    $this->emitTo('products.product-wishlist-count-component', 'refreshComponent');
                    $this->dispatchBrowserEvent('alert',
                    ['type' => 'success',  'message' => 'Product Removed from Wishlist.']);

                    return;

                }catch(Exception $e){
                    $this->dispatchBrowserEvent('alert',
                    ['type' => 'warning',  'message' => 'Error Removing Product from Wishlist.']);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.products.product-wishlist-component');
    }
}
