<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Invoice>
 */
class InvoiceFactory extends Factory
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
            'number' => 'INV-'.fake()->unique()->numerify('######'),
            'issued_at' => fake()->dateTimeBetween('-6 months', 'now'),
            'total_cents' => fake()->numberBetween(1000, 500000),
        ];
    }
}
