<?php

namespace App\Services;

use App\Models\Order;

class InvoiceTotals
{
    /**
     * Compute the total for an order's invoice, in cents: line qty * unit
     * price minus the per-unit line discount, then the partner's volume
     * discount rate applied on top.
     */
    public static function total(Order $order): int
    {
        $total = 0;

        foreach ($order->orderLines as $line) {
            $total += $line->qty * $line->unit_price_cents - $line->discount_cents_per_unit;
        }

        $units = $order->orderLines->sum('qty');
        $rate = DiscountService::rateFor($order->partner, $units);

        return (int) round($total * (1 - $rate));
    }
}
