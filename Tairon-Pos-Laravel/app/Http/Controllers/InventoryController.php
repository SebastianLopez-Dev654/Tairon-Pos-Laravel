<?php

namespace App\Http\Controllers;

use App\Models\Inventory;

class InventoryController extends Controller
{
    /**
     * Listar inventario
     */
    public function index()
    {
        return Inventory::with('product')->get();
    }

    /**
     * Ver inventario de un producto
     */
    public function show($id)
    {
        return Inventory::with('product')->findOrFail($id);
    }
}