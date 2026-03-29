<?php

namespace App\Http\Controllers;

use App\Models\Credit;

class CreditController extends Controller
{
    public function index()
    {
        return Credit::latest()->get();
    }

    public function show($id)
    {
        return Credit::with('payments')->findOrFail($id);
    }

    public function store()
    {
        return response()->json([
            'message' => 'Crear crédito (pendiente lógica)'
        ]);
    }
}