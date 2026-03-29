<?php

namespace App\Http\Controllers;

use App\Models\InventoryMovement;

class InventoryMovementController extends Controller
{
    /**
     * Listar movimientos
     */
    public function index()
    {
        return InventoryMovement::latest()->get();
    }

    /**
     * Movimientos por producto
     */
    public function byProduct($productId)
    {
        return InventoryMovement::where('product_id', $productId)->get();
    }
}