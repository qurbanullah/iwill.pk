<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Product;

use Exception;
use Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class ProductShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $recordsPerPage;
    public $query = '';
    public $highlightIndex;


    public function mount()
    {
        $this->sorting = "default";
        $this->recordsPerPage = 24;
        // Resets the pagination after reloading the page
        $this->resetPage();
        $this->resetVariables();
    }

    public function resetVariables()
    {
        $this->query = '';
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $contact = $this->contacts[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('admin.edit-profession-sub-categories', $contact['id']));
        }
    }

    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function readDatabaeForSearchQuery()
    {
        return Product::select('*')
                    ->where('products.name', 'like', '%' . $this->query . '%')
                    ->paginate($this->recordsPerPage);
    }


    public function readProductDatabase()
    {
        if ($this->sorting == "latest"){
            return Product::latest()->paginate($this->recordsPerPage);
        }
        else if ($this->sorting == "price_ascending") {
            return Product::orderBy('regular_price', 'ASC')->paginate($this->recordsPerPage);
        }
        else if ($this->sorting == "price_decending") {
            return Product::orderBy('regular_price', 'DESC')->paginate($this->recordsPerPage);
        }
        else {
            return Product::paginate($this->recordsPerPage);
        }
    }

    /**
    * The add product to cart function.
    *
    * @return void
    */
    public function AddProductToCart($product_id, $product_name, $product_price)
    {
        try{
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('products.product-cart-count-component', 'refreshComponent');

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Product Added to Cart.']);

        }catch(Exception $e){
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Error Adding Product to Cart.']);
        }

        session()->flash('message', 'Item added in cart');
        return redirect()->route('products.product-cart');
    }

    /**
    * The add product to wishlist function.
    *
    * @return void
    */
    public function AddProductToWishList($product_id, $product_name, $product_price)
    {
        try{
            Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
            $this->emitTo('products.product-wishlist-count-component', 'refreshComponent');

            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Product Added to Wishlist.']);

        }catch(Exception $e){
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Error Adding Product to Wishlist.']);
        }
    }

    /**
    * The remove product from wishlist function.
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

    /**
    * The render function.
    *
    * @return void
    */
    public function render()
    {
        if (auth()->check()){
            Cart::instance('cart')->store(auth()->user()->email);
        }

        return view('livewire.products.product-shop-component', [
            'searchedData' => $this->readDatabaeForSearchQuery(),
            'products' => $this->readProductDatabase(),
        ]);
    }
}
