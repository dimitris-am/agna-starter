<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * List orders, filterable by partner and status.
     */
    public function index(Request $request): View
    {
        $orders = Order::query()
            ->with(['partner', 'pointOfSale', 'invoice'])
            ->when($request->filled('partner_id'), function ($query) use ($request) {
                $query->where('partner_id', $request->integer('partner_id'));
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->string('status'));
            })
            ->orderByDesc('ordered_at')
            ->paginate(20)
            ->withQueryString();

        return view('orders.index', [
            'orders' => $orders,
            'partners' => Partner::orderBy('name')->get(['id', 'name']),
            'statuses' => ['open', 'delivered', 'invoiced'],
            'selectedPartnerId' => $request->integer('partner_id') ?: null,
            'selectedStatus' => $request->string('status')->toString() ?: null,
        ]);
    }
}
