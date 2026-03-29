<?php

namespace App\Http\Controllers;

use App\Models\CashSession;
use App\Models\CashMovement;

class CashController extends Controller
{
    /**
     * Ver estado de caja (sesiones)
     */
    public function index()
    {
        return CashSession::latest()->get();
    }

    /**
     * Movimientos de caja
     */
    public function movements()
    {
        return CashMovement::latest()->get();
    }

    /**
     * Abrir caja (estructura base)
     */
    public function open()
    {
        return response()->json([
            'message' => 'Abrir caja (pendiente lógica)'
        ]);
    }

    /**
     * Cerrar caja (estructura base)
     */
    public function close()
    {
        return response()->json([
            'message' => 'Cerrar caja (pendiente lógica)'
        ]);
    }

    /**
     * Registrar movimiento (estructura base)
     */
    public function movement()
    {
        return response()->json([
            'message' => 'Movimiento de caja (pendiente lógica)'
        ]);
    }
}