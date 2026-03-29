<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryMovementsTable extends Migration
{
    public function up()
    {
        Schema::create('inventory_movements', function (Blueprint $table) {
            $table->id();

            // Producto afectado
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            // Tipo de movimiento
            $table->enum('type', ['in', 'out']);

            // Cantidad
            $table->integer('quantity');

            // Referencia (venta, compra, ajuste)
            $table->string('reference')->nullable();

            // Relación opcional con venta
            $table->foreignId('sale_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventory_movements');
    }
}