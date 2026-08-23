<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'brand_id' => Brand::factory(),
            'sku' => strtoupper(fake()->unique()->bothify('???-###')),
            'name' => ucfirst(fake()->words(2, true)),
            'unit_price_cents' => fake()->numberBetween(80, 900),
        ];
    }
}
