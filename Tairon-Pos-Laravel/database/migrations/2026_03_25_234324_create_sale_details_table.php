<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();

            // Relación con venta
            $table->foreignId('sale_id')
                ->constrained()
                ->cascadeOnDelete();

            // Relación con producto (opcional por seguridad histórica)
            $table->foreignId('product_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Snapshot (clave en POS 🔥)
            $table->string('product_name');

            // Cantidad
            $table->integer('quantity');

            // Precio en ese momento
            $table->decimal('unit_price', 12, 2);

            // Impuestos y descuentos
            $table->decimal('tax', 12, 2)->default(0);
            $table->decimal('discount', 12, 2)->default(0);

            // Total por línea
            $table->decimal('total', 12, 2);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sale_details');
    }
}