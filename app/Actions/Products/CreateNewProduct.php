<?php

namespace App\Actions\Products;

use App\Interfaces\Products\CreateNewProducts;
use App\Models\Product;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CreateNewProduct implements CreateNewProducts
{
    public function create(array $input)
    {
        // dd($input);
        Validator::make($input, [
            'name' => 'required',
            'slug' => 'required',
            // 'stockStatus' => 'required',
            // 'quantity' => 'required',
            // 'isSetToActive' => 'required',
            // 'description' => 'required',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(Product::create([
                'name' => $input['name'],
                'slug' => $input['slug'],
                'short_description' => $input['short_description'],
                'description' => $input['description'],
                'regular_price' => $input['regular_price'],
                'sale_price' => $input['sale_price'],
                'SKU' => $input['SKU'],
                'stock_status' => $input['stock_status'],
                'featured' => $input['featured'],
                'quantity' => $input['quantity'],
                'product_banner_image' => $input['product_banner_image'],
                'product_images' => $input['product_images'],
                'is_active' => $input['is_active'],
                'user_id' => $input['user_id'],
                'product_category_id' => $input['product_category_id'],
                'product_sub_category_id' => $input['product_sub_category_id'],
                ]),
            );
        });
    }
}
