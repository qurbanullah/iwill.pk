<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=4, $asText=true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' =>   $slug,
            'short_description' =>   $this->faker->text(200),
            'description' =>   $this->faker->text(500),
            'regular_price' =>   $this->faker->numberBetween(10,500),
            'SKU' =>   'RFP' . $this->faker->unique()->numberBetween(1000, 9999),
            'stock_status' =>   $this->faker->numberBetween(0, 1),
            'quantity' =>   $this->faker->numberBetween(100, 500),
            'product_banner_image' =>   'digital_' . $this->faker->numberBetween(1, 22) . '.jpg',
            'product_images' =>   'digital_' . $this->faker->numberBetween(1, 22) . '.jpg',
            'is_active' =>   $this->faker->numberBetween(0,1),
            'user_id' =>   $this->faker->numberBetween(1, 5),
            'product_vendor_id' =>   $this->faker->numberBetween(1, 9),
            'product_category_id' =>   $this->faker->numberBetween(1, 14),
            'product_sub_category_id' =>   $this->faker->numberBetween(1,30),
            'product_sub_sub_category_id' =>   $this->faker->numberBetween(1,5),
        ];
    }
}
