<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'stock',
        'minimum_stock',
        'has_tax',
        'tax_percentage',
        'barcode',
        'status'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}