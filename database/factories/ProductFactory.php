<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = array_keys(Product::CATEGORIES);
        
        return [
            'name' => $this->faker->word,
            'category' => $this->faker->randomElement($categories),
            'category_id' => function () {
                return \App\Models\Category::inRandomOrder()->first()->id;
            },
            'description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(1000, 100000),
            'image' => 'products/'.$this->faker->image('public/storage/products', 400, 300, null, false)
        ];
    }
}