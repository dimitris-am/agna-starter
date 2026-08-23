@extends('layouts.app')

@section('title', 'Invoice '.$invoice->number.' - AGNA Distribution')

@section('content')
    <h1>Invoice {{ $invoice->number }}</h1>

    <div class="invoice-box">
        <p><strong>Partner:</strong> {{ $invoice->order->partner->name }} ({{ $invoice->order->partner->city }})</p>
        <p><strong>Point of sale:</strong> {{ $invoice->order->pointOfSale->name }}</p>
        <p><strong>Order #:</strong> {{ $invoice->order->id }}</p>
        <p><strong>Issued at:</strong> {{ $invoice->issued_at->format('Y-m-d') }}</p>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Unit price</th>
                    <th>Discount / unit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->order->orderLines as $line)
                    <tr>
                        <td>{{ $line->product->name }}</td>
                        <td>{{ $line->qty }}</td>
                        <td>{{ number_format($line->unit_price_cents / 100, 2) }}</td>
                        <td>{{ number_format($line->discount_cents_per_unit / 100, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Total:</strong> {{ number_format($invoice->total_cents / 100, 2) }}</p>
    </div>
@endsection
