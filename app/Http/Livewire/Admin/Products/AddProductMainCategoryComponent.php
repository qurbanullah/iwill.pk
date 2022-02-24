<?php

namespace App\Http\Livewire\Admin\Categories;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use Livewire\Component;
use App\Models\MainCategory;
use App\Models\BusinessCategory;
use App\Models\ProductCategory;
use App\Models\ProfessionCategory;
use App\Models\ServiceCategory;

class AddMainCategoryComponent extends Component
{
    public $mainCategory;
    public $mainCategorySlug;
    public $mainCategoryContent;

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
    public function updatedMainCategory($value)
    {
        $this->mainCategorySlug = Str::slug($value);
    }


    /**
    * The validation rules
    *
    * @return void
    */
    public function rules()
    {
        return [
            'mainCategory' => 'required',
            'mainCategorySlug' => ['required', Rule::unique('main_categories', 'slug')],
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
        MainCategory::find($this->mainCategory)->update($this->modelData());
        session()->flash('message', 'Saved.');

    }

    /**
    * The create function.
    *
    * @return void
    */
    public function create()
    {
        if (!empty($this->mainCategory)) {
            if ($this->validate()) {
                // MainCategory::create($this->modelData());
                BusinessCategory::create($this->modelData());
                ProductCategory::create($this->modelData());
                ProfessionCategory::create($this->modelData());
                ServiceCategory::create($this->modelData());
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
            'name' => $this->mainCategory,
            'slug' => $this->mainCategorySlug,
            'content' => $this->mainCategoryContent,
        ];
    }

    public function render()
    {
        //dd ($this->readAddress());
        return view('livewire.admin.categories.add-main-category-component');
    }
}
