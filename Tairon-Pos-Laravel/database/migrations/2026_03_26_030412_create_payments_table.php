<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // crédito al que pertenece
            $table->foreignId('credit_id')
                ->constrained()
                ->cascadeOnDelete();

            // monto abonado
            $table->decimal('amount', 12, 2);

            // método de pago
            $table->string('method')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}