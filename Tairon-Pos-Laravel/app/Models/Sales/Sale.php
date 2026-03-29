<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'customer_id',
        'user_id',
        'reference',
        'subtotal',
        'tax',
        'discount',
        'total',
        'status',
        'payment_method',
        'sold_at',
    ];

    // Relación con detalles
    public function details()
    {
        return $this->hasMany(SaleDetail::class);
    }

    // Relación con cliente
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}