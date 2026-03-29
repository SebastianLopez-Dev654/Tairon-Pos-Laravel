<?php

namespace App\Http\Controllers;

use App\Models\CashMovement;

class CashMovementController extends Controller
{
    /**
     * Listar movimientos de caja
     */
    public function index()
    {
        return CashMovement::latest()->get();
    }

    /**
     * Crear movimiento (estructura base)
     */
    public function store()
    {
        return response()->json([
            'message' => 'Crear movimiento (pendiente lógica)'
        ]);
    }
}