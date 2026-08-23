<?php

namespace Database\Seeders;

use App\Models\Delivery;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Partner;
use App\Models\Product;
use App\Services\DeliveryScheduler;
use App\Services\InvoiceTotals;
use App\Support\Demo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 1500 orders spread over the last 6 months. Every order gets order
     * lines; orders that have moved past "open" get a delivery; orders
     * that have been fully processed also get an invoice.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $partners = Partner::with('pointsOfSale')->get()->filter(
                fn (Partner $partner) => $partner->pointsOfSale->isNotEmpty()
            );

            $products = Product::all();
            $now = Carbon::now();
            $start = $now->copy()->subMonths(6);

            for ($i = 0; $i < 1500; $i++) {
                $partner = $partners->random();
                $pointOfSale = $partner->pointsOfSale->random();

                $orderedAt = Carbon::createFromTimestamp(
                    random_int($start->timestamp, $now->timestamp)
                );

                $status = $this->statusFor($orderedAt, $now);

                $order = Order::create([
                    'partner_id' => $partner->id,
                    'point_of_sale_id' => $pointOfSale->id,
                    'status' => $status,
                    'ordered_at' => $orderedAt,
                ]);

                $lineCount = random_int(1, 5);

                foreach ($products->random(min($lineCount, $products->count())) as $product) {
                    OrderLine::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'qty' => random_int(5, 250),
                        'unit_price_cents' => $product->unit_price_cents,
                        'discount_cents_per_unit' => random_int(1, 100) <= 40 ? random_int(1, 20) : 0,
                    ]);
                }

                if (in_array($status, ['delivered', 'invoiced'], true)) {
                    $scheduledFor = DeliveryScheduler::nextSlot($orderedAt);

                    $delivery = Delivery::create([
                        'order_id' => $order->id,
                        'scheduled_for' => $scheduledFor,
                        'delivered_at' => $scheduledFor->copy()->addHours(random_int(1, 6)),
                        'route_code' => Demo::ROUTE_CODES[array_rand(Demo::ROUTE_CODES)],
                    ]);

                    if ($status === 'invoiced') {
                        Invoice::create([
                            'order_id' => $order->id,
                            'number' => sprintf('INV-%06d', $order->id),
                            'issued_at' => $delivery->delivered_at->copy()->addDay(),
                            'total_cents' => InvoiceTotals::total($order),
                        ]);
                    }
                }
            }
        });
    }

    /**
     * Pick a realistic status for an order based on how long ago it was
     * placed: recent orders are still open, older ones have worked their
     * way through delivery and invoicing.
     */
    private function statusFor(Carbon $orderedAt, Carbon $now): string
    {
        $daysAgo = $orderedAt->diffInDays($now);

        if ($daysAgo <= 5) {
            return random_int(1, 100) <= 70 ? 'open' : 'delivered';
        }

        if ($daysAgo <= 12) {
            $roll = random_int(1, 100);

            return match (true) {
                $roll <= 60 => 'delivered',
                $roll <= 90 => 'invoiced',
                default => 'open',
            };
        }

        return random_int(1, 100) <= 90 ? 'invoiced' : 'delivered';
    }
}
