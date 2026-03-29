<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'product_id',
        'stock',
        'location',
    ];

    /**
     * Relación: inventario pertenece a un producto
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}