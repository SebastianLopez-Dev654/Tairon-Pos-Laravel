<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Campos que se pueden llenar masivamente
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
    ];

    /**
     * Relación: un cliente tiene muchas ventas
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}