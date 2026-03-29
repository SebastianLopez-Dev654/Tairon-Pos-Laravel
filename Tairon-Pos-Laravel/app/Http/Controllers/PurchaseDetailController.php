<?php

namespace App\Http\Controllers;

use App\Models\PurchaseDetail;

class PurchaseDetailController extends Controller
{
    /**
     * Listar detalles de una compra específica
     */
    public function index($purchaseId)
    {
        return PurchaseDetail::where('purchase_id', $purchaseId)->get();
    }
}