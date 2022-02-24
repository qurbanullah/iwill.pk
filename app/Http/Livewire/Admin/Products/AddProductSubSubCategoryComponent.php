<?php

namespace App\Http\Livewire\Admin\Products;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use Livewire\Component;

use App\Models\MainCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductSubSubCategory;

class AddProductSubSubCategoryComponent extends Component
{

    public $mainCategoryId;
    public $productSubCategoryId;
    public $productSubSubCategory;
    public $productSubSubCategorySlug;
    public $productSubSubCategoryContent;

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
    public function updatedProductSubSubCategory($value)
    {
        $this->productSubSubCategorySlug = Str::slug($value);
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
    * The read function.
    *
    * @return void
    */
    public function readProductSubCategories()
    {
        return ProductSubCategory::where('main_category_id', $this->mainCategoryId)->get();
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
            'productSubCategoryId' => 'required',
            'productSubSubCategory' => 'required',
            'productSubSubCategorySlug' => ['required', Rule::unique('product_sub_sub_categories', 'slug')],
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
        ProductSubSubCategory::find($this->productSubSubCategory)->update($this->modelData());
        session()->flash('message', 'Saved.');

    }

    /**
    * The create function.
    *
    * @return void
    */
    public function create()
    {
        if (!empty($this->productSubSubCategory)) {
            if ($this->validate()) {
                ProductSubSubCategory::create($this->modelData());
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
            'name' => $this->productSubSubCategory,
            'slug' => $this->productSubSubCategorySlug,
            'content' => $this->productSubSubCategoryContent,
            'main_category_id' => $this->mainCategoryId,
            'product_sub_category_id' => $this->productSubCategoryId,
        ];
    }

    public function render()
    {
        //dd ($this->readAddress());
        return view('livewire.admin.products.add-product-sub-sub-category-component', [
            'mainCategories' => $this->readMainCategories(),
            'subCategories' => $this->readProductSubCategories(),
        ]);
    }
}
