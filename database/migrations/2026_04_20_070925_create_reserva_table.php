<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('reserva', function (Blueprint $table) {
            $table->id('id_reserva');

            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_servicio');

            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');

            $table->enum('estado', ['Pendiente', 'Confirmada', 'Completada', 'Cancelada'])
                  ->default('Pendiente');

            $table->decimal('total_pago', 10, 2)->nullable();

            $table->foreign('id_cliente')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('id_servicio')
                  ->references('id_servicio')
                  ->on('servicio')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
