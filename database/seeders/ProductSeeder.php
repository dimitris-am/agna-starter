<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 80 products spread across the 12 brands seeded by BrandSeeder.
     */
    public function run(): void
    {
        $catalog = [
            'Dukagjini Foods' => [
                'prefix' => 'DUK',
                'priceRange' => [150, 500],
                'items' => [
                    'Canned White Beans 400g',
                    'Tomato Paste 500g',
                    'Pickled Peppers 300g',
                    'Green Olives in Brine 250g',
                    'Chickpeas 400g',
                    'Red Lentils 500g',
                    'Roasted Red Peppers 280g',
                ],
            ],
            'Adriatik Beverages' => [
                'prefix' => 'ADR',
                'priceRange' => [100, 250],
                'items' => [
                    'Orange Juice 1L',
                    'Apple Juice 1L',
                    'Peach Nectar 1L',
                    'Iced Tea Lemon 0.5L',
                    'Iced Tea Peach 0.5L',
                    'Cola Soft Drink 0.5L',
                    'Lemon Soft Drink 0.5L',
                ],
            ],
            'Malësia Dairy' => [
                'prefix' => 'MAL',
                'priceRange' => [120, 400],
                'items' => [
                    'Fresh Milk 1L',
                    'UHT Milk 1L',
                    'Plain Yogurt 400g',
                    'Strained Yogurt 500g',
                    'White Cheese 400g',
                    'Kashkaval Cheese 300g',
                    'Sour Cream 200g',
                ],
            ],
            'Tomorri Snacks' => [
                'prefix' => 'TOM',
                'priceRange' => [80, 220],
                'items' => [
                    'Salted Chips 100g',
                    'Paprika Chips 100g',
                    'Corn Puffs 80g',
                    'Roasted Peanuts 200g',
                    'Salted Pretzels 150g',
                    'Sweet Popcorn 100g',
                    'Rice Crackers 120g',
                ],
            ],
            'Vjosa Waters' => [
                'prefix' => 'VJO',
                'priceRange' => [60, 220],
                'items' => [
                    'Natural Spring Water 0.5L',
                    'Natural Spring Water 1.5L',
                    'Sparkling Water 0.5L',
                    'Sparkling Water 1.5L',
                    'Mineral Water 5L',
                    'Flavored Water Lemon 0.5L',
                    'Flavored Water Mint 0.5L',
                ],
            ],
            'Drinos Bakery' => [
                'prefix' => 'DRI',
                'priceRange' => [90, 280],
                'items' => [
                    'White Sandwich Bread 500g',
                    'Whole Wheat Bread 500g',
                    'Dinner Rolls 6-Pack',
                    'Breadcrumbs 300g',
                    'Rusk Toast 200g',
                    'Sesame Bagels 4-Pack',
                    'Pita Bread 5-Pack',
                ],
            ],
            'Ilira Confections' => [
                'prefix' => 'ILI',
                'priceRange' => [70, 300],
                'items' => [
                    'Milk Chocolate Bar 100g',
                    'Dark Chocolate Bar 100g',
                    'Hazelnut Wafer 45g',
                    'Cream Sandwich Biscuits 200g',
                    'Butter Cookies 300g',
                    'Marshmallow Twist 150g',
                    'Fruit Jelly Candy 200g',
                ],
            ],
            'Buna Provisions' => [
                'prefix' => 'BUN',
                'priceRange' => [150, 500],
                'items' => [
                    'Sauerkraut Jar 500g',
                    'Corn Kernels 340g',
                    'White Wine Vinegar 1L',
                    'Mixed Pickles 450g',
                    'Tuna in Sunflower Oil 160g',
                    'White Beans in Tomato Sauce 400g',
                    'Roasted Pepper Spread 300g',
                ],
            ],
            'Osumi Oils' => [
                'prefix' => 'OSU',
                'priceRange' => [300, 900],
                'items' => [
                    'Sunflower Oil 1L',
                    'Olive Oil 1L',
                    'Olive Oil 0.5L',
                    'Corn Oil 1L',
                    'Vegetable Oil 2L',
                    'Extra Virgin Olive Oil 0.75L',
                ],
            ],
            'Shpirag Foods' => [
                'prefix' => 'SHP',
                'priceRange' => [90, 260],
                'items' => [
                    'Breadsticks 200g',
                    'Classic Crackers 150g',
                    'Trail Mix 150g',
                    'Roasted Chickpeas 150g',
                    'Dried Fig Bars 120g',
                    'Honey Granola Bar 40g',
                ],
            ],
            'Lura Dairy' => [
                'prefix' => 'LUR',
                'priceRange' => [110, 350],
                'items' => [
                    'Butter 200g',
                    'Cottage Cheese 250g',
                    'Whipped Cream 250ml',
                    'Skimmed Milk 1L',
                    'Strawberry Fruit Yogurt 150g',
                    'Peach Fruit Yogurt 150g',
                ],
            ],
            'Krrabë Beverages' => [
                'prefix' => 'KRR',
                'priceRange' => [90, 240],
                'items' => [
                    'Energy Drink 0.25L',
                    'Tonic Water 0.25L',
                    'Soda Water 1L',
                    'Grapefruit Soft Drink 0.5L',
                    'Ginger Beer 0.33L',
                    'Sports Drink 0.5L',
                ],
            ],
        ];

        foreach ($catalog as $brandName => $spec) {
            $brand = Brand::where('name', $brandName)->firstOrFail();

            foreach ($spec['items'] as $index => $name) {
                Product::create([
                    'brand_id' => $brand->id,
                    'sku' => sprintf('%s-%03d', $spec['prefix'], $index + 1),
                    'name' => $name,
                    'unit_price_cents' => fake()->numberBetween(...$spec['priceRange']),
                ]);
            }
        }
    }
}
