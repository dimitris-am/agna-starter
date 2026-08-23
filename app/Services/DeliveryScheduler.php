<?php

namespace App\Services;

use Carbon\Carbon;

class DeliveryScheduler
{
    /**
     * Next available delivery slot for an order: the day after it was
     * placed, skipping the weekend so it always lands on a weekday.
     */
    public static function nextSlot(Carbon $orderedAt): Carbon
    {
        $next = $orderedAt->copy()->addDay();
        if ($next->isSaturday()) { $next->addDay(); }

        return $next;
    }
}
