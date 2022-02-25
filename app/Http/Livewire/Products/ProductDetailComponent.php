<?php

namespace App\Http\Livewire\Products;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Address;
use Exception;
use Cart;

class ProductDetailComponent extends Component
{
    public $productVendorPhoneNo;
    public $productVendorMobileNo;
    public $modalPhoneNoVisible = false;

    public $productId;
    public $name;
    public $qty;
    public $sku;
    public $comments;
    public $commentContent;
    public $productCategoryId;
    public $productSubCategoryId;

    public $bannerImage;
    public $imageToBePreviewd;

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

        $this->bannerImage = "b3581cfaed50fd8881ce383562a206ca.jpg";
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
    * The read function.
    *
    * @return void
    */
    public function countReviews()
    {
        return ProductReview::where('product_id', $this->productId)->count();
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
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function phoneNoShowModal($id)
    {
        $productData = Product::where('id', $id)->first();
        $productVendor = $productData->user_id;
        // dd($serviceProvider);
        $productVendorAddress = Address::where('user_id', $productVendor)->first();
        if ($productVendorAddress){
            if ($productVendorAddress->phone_no){
                $this->productVendorPhoneNo = $productVendorAddress->phone_no;
            }
            if($productVendorAddress->mobile_no){
                $this->productVendorMobileNo = $productVendorAddress->mobile_no;
            }
        }
        if (!empty($this->productVendorPhoneNo) || !empty($this->productVendorMobileNo)){
            $this->modalPhoneNoVisible = true;
        }
        else {
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Phone No not provided.']);
        }
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
    * preview image at banner image location.
    *
    * @return void
    */
    public function imagePreview($image)
    {
        // dd($image);
        $this->bannerImage = null;
        $this->imageToBePreviewd = $image;
    }

    /**
        * The add product to cart function.
        *
        * @return void
    */
    public function AddProductToCart($product_id, $product_name, $product_price)
    {
        try{
            Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)->associate('App\Models\Product');

            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Product Added to Cart.']);

        }catch(Exception $e){
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Error Adding Product to Cart.']);
        }
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
        ProductReview::create($this->modelData());
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
        return view('livewire.products.product-detail-component', [
            'product' => $this->readProductDatabase(),
            'reviewCount' => $this->countReviews(),
            'relatedProduct' => $this->getRelatedProducts(),
        ]);
    }
}
