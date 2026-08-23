<?php

namespace Database\Factories;

use App\Models\Partner;
use App\Support\Demo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(Demo::PARTNER_SURNAMES).' '.fake()->randomElement(Demo::PARTNER_WORDS).' SHPK',
            'city' => fake()->randomElement(Demo::CITIES),
            'tier' => fake()->randomElement(['a', 'b', 'c']),
        ];
    }
}
