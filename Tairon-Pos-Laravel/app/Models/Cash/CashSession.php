<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashSession extends Model
{
    protected $fillable = [
        'user_id',
        'opening_balance',
        'closing_balance',
        'status',
        'opened_at',
        'closed_at',
    ];

    /**
     * Relación: una sesión tiene muchos movimientos
     */
    public function movements()
    {
        return $this->hasMany(CashMovement::class);
    }

    /**
     * Relación: pertenece a un usuario (cajero)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}