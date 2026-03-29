<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashMovementsTable extends Migration
{
    public function up()
    {
        Schema::create('cash_movements', function (Blueprint $table) {
            $table->id();

            // sesión de caja
            $table->foreignId('cash_session_id')
                ->constrained()
                ->cascadeOnDelete();

            // tipo
            $table->enum('type', ['in', 'out']);

            // monto
            $table->decimal('amount', 12, 2);

            // descripción
            $table->string('description')->nullable();

            // relación con venta
            $table->foreignId('sale_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cash_movements');
    }
}