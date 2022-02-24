<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Product;

use Cart;

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
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('products.product-cart-count-component', 'refreshComponent');
        // dd(Cart::content());

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
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('products.product-wishlist-count-component', 'refreshComponent');
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

    /**
    * The render function.
    *
    * @return void
    */
    public function render()
    {
        return view('livewire.products.product-shop-component', [
            'searchedData' => $this->readDatabaeForSearchQuery(),
            'products' => $this->readProductDatabase(),
        ]);
    }
}
