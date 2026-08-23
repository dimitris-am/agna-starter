<?php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\PointOfSale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointOfSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Every partner gets at least one point of sale, then the remaining
     * outlets are spread randomly across partners, for 200 total.
     */
    public function run(): void
    {
        $partners = Partner::all();

        foreach ($partners as $partner) {
            PointOfSale::factory()->create(['partner_id' => $partner->id]);
        }

        $remaining = 200 - $partners->count();

        for ($i = 0; $i < $remaining; $i++) {
            PointOfSale::factory()->create([
                'partner_id' => $partners->random()->id,
            ]);
        }
    }
}
