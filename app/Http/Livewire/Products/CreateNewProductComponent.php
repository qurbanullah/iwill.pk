<?php

namespace App\Http\Livewire\Products;

use App\Models\Business;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductSubSubCategory;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CreateNewProductComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $name;
    public $slug;
    public $shortDescription;
    public $description;
    public $regularPrice;
    public $salePrice;
    public $SKU;
    public $stockStatus;
    public $featured = false;
    public $quantity;
    public $productBannerImage;
    public $productImages;
    public $isSetToActive = false;
    public $vendor;
    public $businessId;
    public $productCategoryId;
    public $productSubCategoryId;
    public $productSubSubCategoryId;

    public $imageUploaded;
    public $productImagesUploaded;
    public $recordsToDisplay = 10;
    public $query = '';
    public $highlightIndex;
    public $isActive = 1;

    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount()
    {
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
            $this->redirect(route('admin.edit-prodect-categories', $contact['id']));
        }
    }

    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function readDatabaeForSearchQuery()
    {
        return ProductSubSubCategory::select('*')
                    ->where('is_active', $this->isActive)
                    ->where('name', 'like', '%' . $this->query . '%')
                    ->paginate($this->recordsToDisplay);
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function getProductCategory()
    {
        return ProductCategory::where('id', $this->modelId)->first();
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function getProductSubCategory()
    {
        return ProductSubCategory::where('product_category_id', $this->productCategoryId)->get();
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function getBusinesses()
    {
        return Business::where('user_id', auth()->user()->id)->get();
    }

    /**
    * The readProductCategory function.
    *
    * @return void
    */
    public function readProductCategory()
    {
        return ProductCategory::get();
    }


    /**
    * The readProductCategory function.
    *
    * @return void
    */
    public function readProductSubCategory()
    {
        return ProductSubCategory::get();
    }

    /**
     * The readProductCategory function.
     *
     * @return void
     */
    public function readProducts()
    {
        return Product::where('is_active', $this->isActive)
                                ->paginate($this->recordsToDisplay);
    }

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'shortDescription' => 'required',
            'description' => 'required',
            'regularPrice' => 'required',
            'stockStatus' => 'required',
            'quantity' => 'required',
            'isSetToActive' => 'required',
            'productCategoryId' => 'required',
            'productSubCategoryId' => 'required',
        ];
    }

    /**
     * Runs everytime the title
     * variable is updated.
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    /**
    * Runs everytime the pageBannerPhotoPath
    * variable is updated.
    *
    * @return void
    */
    public function updatedPhoto()
    {
        $this->validate([
            'imageUploaded' => 'image|max:1024', // 1MB Max
        ]);
    }

    /**
     * Shows the form modal
     * of the create function.
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }


    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();

        if(empty($this->vendor)) {
            $this->vendor = auth()->user()->id;
        }
        // Service banner image
        if($this->imageUploaded) {
            $this->productBannerImage = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
            $this->imageUploaded->storeAs('public/products-images', $this->productBannerImage);
        }
        else {
            $this->productBannerImage = $this->productBannerImage;
        }

        // service images
        if($this->productImagesUploaded) {
            foreach ($this->productImagesUploaded as $key => $image) {
                $this->productImages[$key] = md5($image . microtime()).'.'.$image->extension();
                $image->storeAs('public/products-images', $this->productImages[$key]);
            }
            $this->productImages = json_encode($this->productImages);
            // dd($this->serviceImages);
        }
        else {
            $this->productImages = $this->productImages;
        }

        Product::create($this->modelData());
        $this->modalFormVisible = false;

        $this->reset();

        session()->flash('success_message', 'New product created successfully.');

    }

    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        if(empty($this->vendor)) {
            $this->vendor = auth()->user()->id;
        }
        // Service banner image
        if($this->imageUploaded) {
            $this->productBannerImage = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
            $this->imageUploaded->storeAs('public/products-images', $this->productBannerImage);
        }
        else {
            $this->productBannerImage = $this->productBannerImage;
        }

        // service images
        if($this->productImagesUploaded) {
            foreach ($this->productImagesUploaded as $key => $image) {
                $this->productImages[$key] = md5($image . microtime()).'.'.$image->extension();
                $image->storeAs('public/products-images', $this->productImages[$key]);
            }
            $this->productImages = json_encode($this->productImages);
            // dd($this->serviceImages);
        }
        else {
            $this->productImages = $this->productImages;
        }

        Product::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;

        $this->reset();
        session()->flash('success_message', 'New product updated successfully.');
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Product::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();

        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Deleted User',
            'eventMessage' => 'The user (' . $this->modelId . ') has been deleted!',
        ]);
    }

    /**
    * Loads the model data
    * of this component.
    *
    * @return void
    */
    public function loadModel()
    {
        $data = Product::find($this->modelId);
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->shortDescription = $data->short_description;
        $this->description = $data->description;
        $this->regularPrice = $data->regular_price;
        $this->salePrice = $data->sale_price;
        $this->SKU = $data->SKU;
        $this->stockStatus = $data->stock_status;
        $this->featured = $data->featured ? null : true;
        $this->quantity = $data->quantity;
        $this->productBannerImage = $data->product_banner_image;
        $this->productImages = $data->procuct_images;
        $this->isSetToActive = !$data->is_active ? null : true;
        $this->vendor = $data->user_id;
        $this->businessId = $data->business_id;
        $this->productCategoryId = $data->product_category_id;
        $this->productSubCategoryId = $data->product_sub_category_id;
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
            'name' => $this->name,
            'slug' => $this->slug,
            'short_description' => $this->shortDescription,
            'description' => $this->description,
            'regular_price' => $this->regularPrice,
            'sale_price' => $this->salePrice,
            'SKU' => $this->SKU,
            'stock_status' => $this->stockStatus,
            'featured' => $this->featured,
            'quantity' => $this->quantity,
            'product_banner_image' => $this->productBannerImage,
            'product_images' => $this->productImages,
            'is_active' => $this->isSetToActive,
            'user_id' => $this->vendor,
            'business_id' => $this->businessId,
            'product_category_id' => $this->productCategoryId,
            'product_sub_category_id' => $this->productSubCategoryId,
        ];
    }


    /**
     * Dispatch event
     *
     * @return void
     */
    public function dispatchEvent()
    {
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Sample Event',
            'eventMessage' => 'You have a sample event notification!',
        ]);
    }


    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.products.create-new-product-component', [
            'productCategories' => $this->readProductCategory(),
            'productsSearched' => $this->readDatabaeForSearchQuery(),
            'productSubCategories' => $this->getProductSubCategory(),
            'products' => $this->readProducts(),
            'businesses' => $this->getBusinesses(),
        ]);
    }
}
