<?php

namespace Database\Factories;

use App\Models\Partner;
use App\Models\PointOfSale;
use App\Support\Demo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PointOfSale>
 */
class PointOfSaleFactory extends Factory
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
            'name' => fake()->randomElement(Demo::POS_TYPES).' '.fake()->randomElement(Demo::POS_AREAS),
            'city' => fake()->randomElement(Demo::CITIES),
        ];
    }
}
