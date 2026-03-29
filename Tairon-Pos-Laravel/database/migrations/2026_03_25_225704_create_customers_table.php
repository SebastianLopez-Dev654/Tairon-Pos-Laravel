<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nombre del cliente
            $table->string('document')->unique(); // cédula o documento único
            $table->string('phone')->nullable(); // teléfono opcional
            $table->string('address')->nullable(); // dirección opcional
            $table->boolean('status')->default(true); // activo / inactivo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}