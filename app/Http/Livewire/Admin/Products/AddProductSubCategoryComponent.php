<?php

namespace App\Http\Livewire\Admin\Products;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use Livewire\Component;

use App\Models\MainCategory;
use App\Models\ProductSubCategory;

class AddProductSubCategoryComponent extends Component
{
    public $mainCategoryId;
    public $productSubCategory;
    public $productSubCategorySlug;
    public $productSubCategoryContent;

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
    public function updatedProductSubCategory($value)
    {
        $this->productSubCategorySlug = Str::slug($value);
    }


    /**
    * The read function.
    *
    * @return void
    */
    public function readMainCategories()
    {
        // return ProductCategory::get();
        return MainCategory::get();
    }

    /**
    * The validation rules
    *
    * @return void
    */
    public function rules()
    {
        return [
            'mainCategoryId' => 'required',
            'productSubCategory' => 'required',
            'productSubCategorySlug' => ['required', Rule::unique('product_sub_categories', 'slug')],
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
        ProductSubCategory::find($this->productSubCategory)->update($this->modelData());
        session()->flash('message', 'Saved.');

    }

    /**
    * The create function.
    *
    * @return void
    */
    public function create()
    {
        if (!empty($this->productSubCategory)) {
            if ($this->validate()) {
                ProductSubCategory::create($this->modelData());
                session()->flash('message', 'Saved.');
            }
        }
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
            'name' => $this->productSubCategory,
            'slug' => $this->productSubCategorySlug,
            'content' => $this->productSubCategoryContent,
            'main_category_id' => $this->mainCategoryId,
        ];
    }

    public function render()
    {
        //dd ($this->readAddress());
        return view('livewire.admin.products.add-product-sub-category-component', [
            'mainCategories' => $this->readMainCategories(),
        ]);
    }
}
