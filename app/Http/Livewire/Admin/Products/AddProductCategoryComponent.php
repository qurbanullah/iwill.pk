<?php

namespace App\Http\Livewire\Admin\Products;

use App\Actions\Products\CreateNewProductCategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use Livewire\Component;
use App\Models\ProductCategory;

class AddProductCategoryComponent extends Component
{
    public $productCategory;
    public $productCategorySlug;
    public $productCategoryContent;

    /**
    * The livewire mount function
    *
    * @return void
    */

        /**
    * Runs everytime the title
    * variable is updated.
    *
    * @param  mixed $value
    * @return void
    */
    public function updatedProductCategory($value)
    {
        $this->productCategorySlug = Str::slug($value);
    }


    /**
    * The validation rules
    *
    * @return void
    */
    public function rules()
    {
        return [
            'productCategory' => 'required',
            'productCategorySlug' => ['required', Rule::unique('product_categories', 'slug')],
        ];
    }

          /**
    * The update function.
    *
    * @return void
    */
    public function update()
    {
        $this->validate();
        ProductCategory::find($this->productCategory)->update($this->modelData());
        session()->flash('message', 'Saved.');

    }

    /**
    * The create function.
    *
    * @return void
    */
    public function create(CreateNewProductCategory $action)
    {
        // if (!empty($this->productCategory)) {
        //     if ($this->validate()) {
        //         productCategory::create($this->modelData());
        //         session()->flash('message', 'Saved.');
        //     }
        // }
        $action->create($this->modelData());
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
            'name' => $this->productCategory,
            'slug' => $this->productCategorySlug,
            'content' => $this->productCategoryContent,
        ];
    }

    public function render()
    {
        //dd ($this->readAddress());
        return view('livewire.admin.products.add-product-category-component');
    }
}
