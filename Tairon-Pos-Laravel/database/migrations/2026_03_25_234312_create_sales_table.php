<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            // Cliente (opcional - venta mostrador)
            $table->foreignId('customer_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Usuario (futuro: cajero)
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Identificador de la venta
            $table->string('reference')->unique();

            // Totales
            $table->decimal('subtotal', 12, 2);
            $table->decimal('tax', 12, 2)->default(0);
            $table->decimal('discount', 12, 2)->default(0);
            $table->decimal('total', 12, 2);

            // Estado
            $table->enum('status', ['completed', 'pending', 'cancelled'])
                ->default('completed');

            // Método de pago (simple por ahora)
            $table->enum('payment_method', ['cash', 'card', 'transfer', 'credit'])
                ->default('cash');

            // Fecha real de venta
            $table->timestamp('sold_at')->useCurrent();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}