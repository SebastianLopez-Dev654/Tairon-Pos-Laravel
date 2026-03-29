<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
    ];

    /**
     * Relación: proveedor tiene muchas compras
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}