<?php

namespace App\Actions\Products;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Interfaces\Products\CreateNewProductCategories;
use App\Models\ProductCategory;

class CreateNewProductCategory implements CreateNewProductCategories
{
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => 'required',
            'slug' =>  ['required', Rule::unique('mysql_iwill_product.product_categories', 'slug')],
            'content' => 'required',
            'image' => 'required',
            'is_active' => 'required'
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(ProductCategory::create([
                'name' => $input['name'],
                'slug' => $input['slug'],
                'content' => $input['content'],
                'image' => $input['image'],
                'is_active' => $input['is_active'],
                ]),
            );
        });
    }
}


?>
