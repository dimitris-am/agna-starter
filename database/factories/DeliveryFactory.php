<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\Order;
use App\Support\Demo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $scheduledFor = fake()->dateTimeBetween('-6 months', 'now');

        return [
            'order_id' => Order::factory(),
            'scheduled_for' => $scheduledFor,
            'delivered_at' => fake()->dateTimeBetween($scheduledFor, (clone $scheduledFor)->modify('+6 hours')),
            'route_code' => fake()->randomElement(Demo::ROUTE_CODES),
        ];
    }
}
