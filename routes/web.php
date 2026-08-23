<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/orders');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
