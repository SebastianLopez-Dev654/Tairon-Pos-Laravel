<?php

namespace App\Http\Controllers;

use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        return Purchase::latest()->get();
    }

    public function show($id)
    {
        return Purchase::with('details')->findOrFail($id);
    }

    public function store()
    {
        return response()->json([
            'message' => 'Crear compra (pendiente lógica)'
        ]);
    }
    public function cancel($id)
    {
        $purchase = Purchase::findOrFail($id);

        $purchase->update([
            'status' => 'cancelled'
        ]);

        return $purchase;
    }
}