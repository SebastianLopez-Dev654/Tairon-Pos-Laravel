<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();

            // Relación con producto
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            // Stock actual
            $table->integer('stock')->default(0);

            // Ubicación (preparado para futuro multi-bodega)
            $table->string('location')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}