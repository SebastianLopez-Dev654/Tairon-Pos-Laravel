<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable = [
        'purchase_id',
        'product_id',
        'product_name',
        'quantity',
        'unit_cost',
        'total',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}