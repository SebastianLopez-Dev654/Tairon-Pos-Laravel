<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('cash_sessions', function (Blueprint $table) {
            $table->id();

            // usuario (cajero)
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // dinero inicial
            $table->decimal('opening_balance', 12, 2);

            // dinero final
            $table->decimal('closing_balance', 12, 2)->nullable();

            // estado
            $table->enum('status', ['open', 'closed'])
                ->default('open');

            // tiempos
            $table->timestamp('opened_at')->useCurrent();
            $table->timestamp('closed_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cash_sessions');
    }
}