<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderLine>
 */
class OrderLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
            'qty' => fake()->numberBetween(5, 250),
            'unit_price_cents' => fake()->numberBetween(80, 900),
            'discount_cents_per_unit' => fake()->boolean(40) ? fake()->numberBetween(1, 20) : 0,
        ];
    }
}
