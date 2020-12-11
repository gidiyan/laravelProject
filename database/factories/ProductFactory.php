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
        return [
            'name' => $this->faker->unique()->word(),
            'details' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(10, 200),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl($width = 250, $height = 150, 'cats'),
            'status' => $this->faker->randomElement([0, 1]),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
