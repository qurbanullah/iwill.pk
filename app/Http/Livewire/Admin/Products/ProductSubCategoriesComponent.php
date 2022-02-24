<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\MainCategory;
use App\Models\ProductSubCategory;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductSubCategoriesComponent extends Component
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
    public $mainCategoryId;
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
        $this->mainCategoryId = null;
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
        return ProductSubCategory::select('*')
                    ->where('is_active', $this->isActive)
                    ->where('name', 'like', '%' . $this->query . '%')
                    ->paginate($this->recordsToDisplay);
    }

    /**
    * The read function.
    *
    * @return void
    */
    // public function getproductCategory()
    // {
    //     return productCategory::where('id', $this->modelId)->first();
    // }

    /**
    * The read function.
    *
    * @return void
    */
    // public function getproductSubCategory()
    // {
    //     return productSubCategory::where('id', $this->professionCategoryId)->first();
    // }


        /**
     * The readproductCategory function.
     *
     * @return void
     */
    public function readMainCategory()
    {
        return MainCategory::get();
    }

    /**
     * The readproductCategory function.
     *
     * @return void
     */
    public function readproductSubCategory()
    {
        return productSubCategory::where('is_active', $this->isActive)
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
            'slug' => ['required', Rule::unique('product_sub_categories', 'slug')->ignore($this->modelId)],
            'content' => 'required',
            'isSetToActive' => 'required',
            'mainCategoryId' => 'required',
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

        if($this->imageUploaded) {
            $this->image = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
            $this->imageUploaded->storeAs('public/categories/product-categories-images', $this->image);

            ProductSubCategory::create($this->modelData());
            $this->modalFormVisible = false;

        }
        else {
            ProductSubCategory::create($this->modelData());
            $this->modalFormVisible = false;
        }

        $this->reset();

        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'New Category',
            'eventMessage' => 'Another category has been created!',
        ]);
    }

    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        if($this->imageUploaded) {
            $this->image = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
            $this->imageUploaded->storeAs('public/categories/product-categories-images', $this->image);

            ProductSubCategory::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;

        }
        else {
            ProductSubCategory::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;
        }

        $this->reset();
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Record updated',
            'eventMessage' => 'There is a record (' . $this->modelId . ') that has been updated!',
        ]);
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        ProductSubCategory::destroy($this->modelId);
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
        $data = ProductSubCategory::find($this->modelId);
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->content = $data->content;
        $this->image = $data->image;
        $this->isSetToActive = !$data->is_active ? null : true;
        $this->mainCategoryId = $data->main_category_id;
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
            'main_category_id' => $this->mainCategoryId,
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
        return view('livewire.admin.products.product-sub-categories-component', [
            'mainCategories' => $this->readMainCategory(),
            'productSubCategories' => $this->readProductSubCategory(),
            'productSubCategoriesSearched' => $this->readDatabaeForSearchQuery(),

        ]);
    }
}
