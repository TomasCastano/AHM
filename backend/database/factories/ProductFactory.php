<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            "product_name" => fake()->unique()->words(8, true),
            "product_reference" => fake()->words(8, true),
            "product_size" => fake()->words(8, true),
            "product_description" => fake()->words(8, true),
            "product_image" => fake()->words(8, true),
            "category_id" => fake()->numberBetween(50, 1000),
            "product_price" =>fake()->randomElement(["45000", "80000", "100000"]),
        ];
    }
}
