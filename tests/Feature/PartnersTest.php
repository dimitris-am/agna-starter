<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Partner;
use App\Models\PointOfSale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartnersTest extends TestCase
{
    use RefreshDatabase;

    public function test_orders_can_be_filtered_by_partner(): void
    {
        $partnerA = Partner::factory()->create();
        $posA = PointOfSale::factory()->create(['partner_id' => $partnerA->id]);

        $partnerB = Partner::factory()->create();
        $posB = PointOfSale::factory()->create(['partner_id' => $partnerB->id]);

        Order::factory()->create(['partner_id' => $partnerA->id, 'point_of_sale_id' => $posA->id]);
        Order::factory()->create(['partner_id' => $partnerB->id, 'point_of_sale_id' => $posB->id]);

        $response = $this->get('/orders?partner_id='.$partnerA->id);

        $response->assertOk();
        $response->assertViewHas('orders', function ($orders) use ($partnerA) {
            $collection = $orders->getCollection();

            return $collection->count() === 1
                && $collection->first()->partner_id === $partnerA->id;
        });
    }

    public function test_orders_filter_dropdown_lists_all_partners(): void
    {
        Partner::factory()->count(5)->create();

        $response = $this->get('/orders');

        $response->assertOk();
        $response->assertViewHas('partners', fn ($partners) => $partners->count() === 5);
    }

    public function test_partner_tier_rejects_a_value_outside_a_b_c(): void
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Partner::factory()->create(['tier' => 'z']);
    }
}
