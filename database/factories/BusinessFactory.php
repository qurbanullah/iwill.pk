<?php

namespace Database\Factories;

use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BusinessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Business::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $business_name = $this->faker->unique()->words($nb=4, $asText=true);
        $slug = Str::slug($business_name);
        return [
            'name' => $business_name,
            'slug' =>   $slug,
            'short_description' =>   $this->faker->text(200),
            'description' =>   $this->faker->text(500),
            'BIU' =>   'RFB' . $this->faker->unique()->numberBetween(1000, 9999),
            'business_status' =>   $this->faker->numberBetween(0, 1),
            'business_banner_image' =>   'business_' . $this->faker->numberBetween(1, 20) . '.jpg',
            'thumbnail' =>   'business_' . $this->faker->numberBetween(1, 20) . '.jpg',
            'is_default_home_page' =>   $this->faker->numberBetween(0, 1),
            'is_active' =>   $this->faker->numberBetween(0, 1),
            'user_id' =>   $this->faker->numberBetween(1, 5),
            'main_category_id' =>   $this->faker->numberBetween(1, 5),
            'business_sub_category_id' =>   $this->faker->numberBetween(1,5),
            'business_sub_sub_category_id' =>   $this->faker->numberBetween(1,5),
        ];
    }
}
