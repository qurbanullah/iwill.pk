<?php

namespace App\Http\Livewire\Products;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use Livewire\Component;
use App\Models\Product;
use App\Models\Comment;
use Cart;

class ProductDetail extends Component
{
    public $productId;
    public $name;
    public $qty;
    public $sku;
    public $comments;
    public $commentContent;
    public $productCategoryId;
    public $productSubCategoryId;

    // $posts should not be declared as a property in the Livewire component class,
    // you passed the posts with the laravel view() helpers as data.
    // Remove the line
    // public $posts;
    // And replace $this->posts by $posts in the render function:
    // https://stackoverflow.com/questions/64721432/livewire-throwing-error-when-using-paginated-data

    public function mount($product_id)
    {
        try {
            $decrypted = Crypt::decrypt($product_id);
        } catch (DecryptException $e) {
            $message = "Decryption failed with error $e";
        }
        $this->productId = $decrypted;

        $this->qty = 1;
    }

    public function increaseProductQuantity()
    {
        $this->qty++;
    }

    public function decreaseProductQuantity()
    {
        if($this->qty > 1){
            $this->qty--;
        }
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function readProductDatabase()
    {
        $product = Product::where('id', $this->productId)->first();
        if (empty($product)) {
            abort(404, 'Requested product does not exists.');
        } else {
            $this->productCategoryId = $product->product_category_id;
            $this->productSubCategoryId = $product->product_sub_category_id;
            return $product;
        }
    }

    /**
    * get professionals related to current post.
    *
    * @return void
    */
    public function getRelatedProducts()
    {
        $relatedProducts = Product::where('product_sub_category_id', $this->productSubCategoryId)->inRandomOrder()->limit(20)->get();
        // dd($professionals);
        return $relatedProducts;
    }

    /**
    * get professions related to current post.
    *
    * @return void
    */
    // public function getRelatedProfessions()
    // {
    //     $professions = ProfessionSubCategory::where('category_id', $this->professionCategoryId)->inRandomOrder()->limit(20)->get();
    //     // dd($professionals);
    //     return $professions;
    // }

    /**
    * The validation rules
    *
    * @return void
    */
    public function rules()
    {
        return [
            'commentContent' => 'required',
        ];
    }

    /**
        * The add product to cart function.
        *
        * @return void
    */
    public function AddProductToCart($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)->associate('App\Models\Product');

        // dd(Cart::content());

        session()->flash('message', 'Item added in cart');
        return redirect()->route('products.product-cart');
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function store()
    {
        $this->validate();
        Comment::create($this->modelData());
        $this->reset('commentContent');
        session()->flash('message', 'Comment added successfully.');

    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return [
            'user_id' => auth()->user()->id,
            'product_id' => $this->productd,
            'content' => $this->commentContent,
        ];
    }

    /**
     * The render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.products.product-detail', [
            'product' => $this->readProductDatabase(),
            'relatedProduct' => $this->getRelatedProducts(),
        ]);
    }
}
