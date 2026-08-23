<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    /**
     * Show a single invoice with its order, partner and line items.
     */
    public function show(Invoice $invoice): View
    {
        $invoice->load(['order.partner', 'order.pointOfSale', 'order.orderLines.product']);

        return view('invoices.show', [
            'invoice' => $invoice,
        ]);
    }
}
