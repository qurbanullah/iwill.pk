<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\ProductVendor;
use App\Models\BusinessCategory;
use App\Models\ProfessionCategory;
use App\Models\ServiceCategory;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use Exception;

class ProductsVendorsComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $name;
    public $slug;
    public $content;
    public $isSetToActive = false;
    public $image;
    public $imageUploaded;
    public $recordsToDisplay;
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
        $this->recordsToDisplay = 25;
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
        // if ($contact) {
        //     $this->redirect(route('admin.categories.main-category-detail', $contact['id']));
        // }
    }

    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function readDatabaeForSearchQuery()
    {
        return ProductVendor::select('*')
                    ->where('is_active', $this->isActive)
                    ->where('name', 'like', '%' . $this->query . '%')
                    ->paginate($this->recordsToDisplay);
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function getProductVendor()
    {
        return ProductVendor::where('id', $this->modelId)->first();
    }

    /**
     * The readProductVendor function.
     *
     * @return void
     */
    public function readProductVendor()
    {
        return ProductVendor::where('is_active', $this->isActive)
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
            'slug' => ['required', Rule::unique('mysql_iwill_products.product_vendors', 'slug')->ignore($this->modelId)],
            'content' => 'required',
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
        try{
            $this->validate();

            if($this->imageUploaded) {
                $this->image = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
                $this->imageUploaded->storeAs('public/product-categories-images', $this->image);

                ProductVendor::create($this->modelData());
                // BusinessCategory::create($this->modelData());
                // ProductVendor::create($this->modelData());
                // ProfessionCategory::create($this->modelData());
                // ServiceCategory::create($this->modelData());
                $this->modalFormVisible = false;
            }
            else {
                ProductVendor::create($this->modelData());
                // BusinessCategory::create($this->modelData());
                // ProductVendor::create($this->modelData());
                // ProfessionCategory::create($this->modelData());
                // ServiceCategory::create($this->modelData());
                $this->modalFormVisible = false;
            }

            $this->resetPage();

            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Product Vendor Created Successfully!']);

        }catch(Exception $e){
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Error Creating Product Vendor.']);
        }
    }

    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        try{
            $this->validate();

            if($this->imageUploaded) {
                $this->image = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
                $this->imageUploaded->storeAs('public/product-categories-images', $this->image);

                ProductVendor::find($this->modelId)->update($this->modelData());
                // BusinessCategory::find($this->modelId)->update($this->modelData());
                // ProductVendor::find($this->modelId)->update($this->modelData());
                // ProfessionCategory::find($this->modelId)->update($this->modelData());
                // ServiceCategory::find($this->modelId)->update($this->modelData());
                $this->modalFormVisible = false;

            }
            else {
                ProductVendor::find($this->modelId)->update($this->modelData());
                // BusinessCategory::find($this->modelId)->update($this->modelData());
                // ProductVendor::find($this->modelId)->update($this->modelData());
                // ProfessionCategory::find($this->modelId)->update($this->modelData());
                // ServiceCategory::find($this->modelId)->update($this->modelData());
                $this->modalFormVisible = false;
            }

            $this->resetPage();

            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Product Vendor Updated Successfully!']);

        }catch(Exception $e){
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Error Updating Product Vendor.']);
        }
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        try{
            ProductVendor::destroy($this->modelId);
            $this->modalConfirmDeleteVisible = false;
            $this->resetPage();

            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Product Vendor Deleted Successfully!']);

        }catch(Exception $e){
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Error Deleting Product Vendor.']);
        }
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = ProductVendor::find($this->modelId);
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->content = $data->content;
        $this->image = $data->image;
        $this->isSetToActive = !$data->is_active ? null : true;
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
            'content' => $this->content,
            'image' => $this->image,
            'is_active' => $this->isSetToActive,
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
        return view('livewire.admin.products.products-vendors-component', [
            'data' => $this->readProductVendor(),
            'searchedData' => $this->readDatabaeForSearchQuery(),
        ]);
    }
}
