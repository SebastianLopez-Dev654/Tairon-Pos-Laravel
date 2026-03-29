<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();

            // cliente
            $table->foreignId('customer_id')
                ->constrained()
                ->cascadeOnDelete();

            // venta asociada
            $table->foreignId('sale_id')
                ->constrained()
                ->cascadeOnDelete();

            // monto total
            $table->decimal('total', 12, 2);

            // saldo pendiente
            $table->decimal('balance', 12, 2);

            // estado
            $table->enum('status', ['pending', 'paid'])
                ->default('pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('credits');
    }
}