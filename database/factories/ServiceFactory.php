<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $service_name = $this->faker->unique()->words($nb=4, $asText=true);
        $slug = Str::slug($service_name);
        return [
            'name' => $service_name,
            'slug' =>   $slug,
            'tagline' =>   $this->faker->text(200),
            'short_description' =>   $this->faker->text(200),
            'description' =>   $this->faker->text(500),
            'inclusion' =>   $this->faker->text(500),
            'exclusion' =>   $this->faker->text(500),
            'regular_price' =>   $this->faker->numberBetween(10,500),
            'SIU' =>   'RFS' . $this->faker->unique()->numberBetween(1000, 9999),
            'service_status' =>   $this->faker->numberBetween(0, 1),
            'service_banner_image' =>   'service_' . $this->faker->numberBetween(1, 20) . '.jpg',
            'thumbnail' =>   'service_' . $this->faker->numberBetween(1, 20) . '.jpg',
            'is_active' =>   $this->faker->numberBetween(0,1),
            'user_id' =>   $this->faker->numberBetween(1, 5),
            'main_category_id' =>   $this->faker->numberBetween(1, 5),
            'service_sub_category_id' =>   $this->faker->numberBetween(1,5),
            'service_sub_sub_category_id' =>   $this->faker->numberBetween(1,5),
        ];
    }
}
