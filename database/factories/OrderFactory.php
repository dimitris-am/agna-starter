<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Partner;
use App\Models\PointOfSale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'partner_id' => Partner::factory(),
            'point_of_sale_id' => PointOfSale::factory(),
            'status' => fake()->randomElement(['open', 'delivered', 'invoiced']),
            'ordered_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
