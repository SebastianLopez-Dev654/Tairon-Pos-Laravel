<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashMovement extends Model
{
    protected $fillable = [
        'cash_session_id',
        'type',
        'amount',
        'description',
        'sale_id',
    ];

    /**
     * Relación: pertenece a una sesión de caja
     */
    public function session()
    {
        return $this->belongsTo(CashSession::class, 'cash_session_id');
    }

    /**
     * Relación con venta
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}