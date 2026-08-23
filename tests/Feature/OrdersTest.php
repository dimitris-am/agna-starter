<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Partner;
use App\Models\PointOfSale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    use RefreshDatabase;

    public function test_orders_index_lists_orders(): void
    {
        $partner = Partner::factory()->create();
        $pointOfSale = PointOfSale::factory()->create(['partner_id' => $partner->id]);

        Order::factory()->count(3)->create([
            'partner_id' => $partner->id,
            'point_of_sale_id' => $pointOfSale->id,
        ]);

        $response = $this->get('/orders');

        $response->assertOk();
        $response->assertSee($partner->name);
    }

    public function test_orders_index_can_filter_by_status(): void
    {
        $partner = Partner::factory()->create();
        $pointOfSale = PointOfSale::factory()->create(['partner_id' => $partner->id]);

        Order::factory()->create([
            'partner_id' => $partner->id,
            'point_of_sale_id' => $pointOfSale->id,
            'status' => 'open',
        ]);

        Order::factory()->create([
            'partner_id' => $partner->id,
            'point_of_sale_id' => $pointOfSale->id,
            'status' => 'invoiced',
        ]);

        $response = $this->get('/orders?status=open');

        $response->assertOk();
        $response->assertViewHas('orders', function ($orders) {
            return $orders->getCollection()->isNotEmpty()
                && $orders->getCollection()->every(fn (Order $order) => $order->status === 'open');
        });
    }

    public function test_orders_index_paginates(): void
    {
        $partner = Partner::factory()->create();
        $pointOfSale = PointOfSale::factory()->create(['partner_id' => $partner->id]);

        Order::factory()->count(25)->create([
            'partner_id' => $partner->id,
            'point_of_sale_id' => $pointOfSale->id,
        ]);

        $response = $this->get('/orders');

        $response->assertOk();
        $response->assertViewHas('orders', fn ($orders) => $orders->count() === 20);
    }
}
