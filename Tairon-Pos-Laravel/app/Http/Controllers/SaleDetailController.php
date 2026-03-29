<?php

namespace App\Http\Controllers;

use App\Models\SaleDetail;

class SaleDetailController extends Controller
{
    /**
     * Listar detalles de una venta específica
     */
    public function index($saleId)
    {
        return SaleDetail::where('sale_id', $saleId)->get();
    }
}