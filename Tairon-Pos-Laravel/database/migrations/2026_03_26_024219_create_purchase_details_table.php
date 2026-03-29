<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();

            // relación con compra
            $table->foreignId('purchase_id')
                ->constrained()
                ->cascadeOnDelete();

            // producto
            $table->foreignId('product_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // snapshot
            $table->string('product_name');

            $table->integer('quantity');

            // costo de compra
            $table->decimal('unit_cost', 12, 2);

            $table->decimal('total', 12, 2);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}