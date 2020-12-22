<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $brands = \DB::table('brands')->pluck('id');
        $categories = \DB::table('categories')->pluck('id');
        return [
            'name' => $this->faker->unique()->word(),
            'details' => $this->faker->sentence(),
            'brand_id' => $this->faker->randomElement($brands),
            'category_id' => $this->faker->randomElement($categories),
            'price' => $this->faker->numberBetween(19,499),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl($width = 250, $height = 150, 'cats'),
            'created_at' => now(),
            'updated_at' => now(),
            'status' =>$this->faker->randomElement([0,1])
        ];
    }
}
