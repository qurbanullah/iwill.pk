<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Product;
use App\Models\ProductCategory;

use Cart;


class ProductsByCategory extends Component
{
    use WithPagination;

    public $sorting;
    public $recordsPerPage;
    public $query = '';
    public $highlightIndex;

    public $productCategoryId;
    public $productCategoryName;
    public $productCategorySlug;


    public function mount($product_category_slug)
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
        $this->resetVariables();

        $this->sorting = "default";
        $this->recordsPerPage = 24;

        $product_category = ProductCategory::where('slug', $product_category_slug)->first();
        $this->productCategoryId =  $product_category->id;
        $this->productCategoryName =  $product_category->name;
        $this->productCategorySlug =  $product_category->slug;

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
            return Product::where('product_category_id', $this->productCategoryId)
                            ->latest()
                            ->paginate($this->recordsPerPage);
        }
        else if ($this->sorting == "price_ascending") {
            return Product::where('product_category_id', $this->productCategoryId)
                            ->orderBy('regular_price', 'ASC')
                            ->paginate($this->recordsPerPage);
        }
        else if ($this->sorting == "price_decending") {
            return Product::where('product_category_id', $this->productCategoryId)
                            ->orderBy('regular_price', 'DESC')
                            ->paginate($this->recordsPerPage);
        }
        else {
            return Product::where('product_category_id', $this->productCategoryId)
                            ->paginate($this->recordsPerPage);
        }
    }


    /**
    * The add product to cart function.
    *
    * @return void
    */
    public function AddProductToCart($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');

        // dd(Cart::content());

        session()->flash('message', 'Item added in cart');
        return redirect()->route('products.product-cart');
    }

    public function render()
    {
        return view('livewire.products.products-by-category', [
            'searchedData' => $this->readDatabaeForSearchQuery(),
            'products' => $this->readProductDatabase(),
        ]);
    }
}
