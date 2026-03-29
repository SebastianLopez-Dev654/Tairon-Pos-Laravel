<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class PaymentController extends Controller
{
    public function store()
    {
        return response()->json([
            'message' => 'Registrar pago (pendiente lógica)'
        ]);
    }
}