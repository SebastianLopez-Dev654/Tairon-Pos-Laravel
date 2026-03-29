<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SaleController extends Controller
{
    /**
     * Crear venta completa (flujo POS)
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            $data = $request->validate([
                'customer_id' => ['nullable', 'exists:customers,id'],
                'payment_method' => ['required', 'string'],
                'items' => ['required', 'array'],
            ]);

            // Generar referencia única
            $reference = 'SALE-' . strtoupper(Str::random(8));

            $subtotal = 0;
            $tax = 0;
            $discount = 0;

            // Crear venta
            $sale = Sale::create([
                'customer_id' => $data['customer_id'] ?? null,
                'reference' => $reference,
                'subtotal' => 0,
                'tax' => 0,
                'discount' => 0,
                'total' => 0,
                'payment_method' => $data['payment_method'],
            ]);

            // Procesar productos
            foreach ($data['items'] as $item) {

                $lineTotal = $item['quantity'] * $item['unit_price'];

                $subtotal += $lineTotal;

                SaleDetail::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['product_id'] ?? null,
                    'product_name' => $item['product_name'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'tax' => $item['tax'] ?? 0,
                    'discount' => $item['discount'] ?? 0,
                    'total' => $lineTotal,
                ]);
            }

            $total = $subtotal + $tax - $discount;

            // Actualizar venta
            $sale->update([
                'subtotal' => $subtotal,
                'tax' => $tax,
                'discount' => $discount,
                'total' => $total,
            ]);

            return $sale->load('details');
        });
    }
}