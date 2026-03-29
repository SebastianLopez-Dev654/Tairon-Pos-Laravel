<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Listar clientes (uso secundario)
     */
    public function index()
    {
        return Customer::query()
            ->latest()
            ->paginate(15);
    }

    /**
     * Crear cliente rápido desde caja
     */
    public function store(Request $request)
    {
        // Validación básica
        $data = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);

        // Evitar duplicados por teléfono
        if (!empty($data['phone'])) {
            $existing = Customer::where('phone', $data['phone'])->first();

            if ($existing) {
                return $existing;
            }
        }

        // Crear cliente
        return Customer::create($data);
    }

    /**
     * Buscar cliente (clave en POS)
     */
    public function search(Request $request)
    {
        $q = $request->query('q');

        // Evita consultas vacías
        if (!$q) {
            return [];
        }

        return Customer::query()
            ->where('name', 'like', "%{$q}%")
            ->orWhere('phone', 'like', "%{$q}%")
            ->limit(10)
            ->get();
    }
}