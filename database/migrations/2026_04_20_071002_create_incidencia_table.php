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

        Schema::create('INCIDENCIA', function (Blueprint $table) {
            $table->id('id_incidencia');

            $table->unsignedBigInteger('id_reserva');

            $table->enum('tipo_excepcion', [
                'Perdida',
                'Ataque',
                'Denuncia',
                'Emergencia_Medica',
                'Otro'
            ]);

            $table->text('descripcion');

            $table->enum('estado_resolucion', [
                'Abierta',
                'En curso',
                'Cerrada'
            ])->default('Abierta');

            $table->timestamp('fecha_reporte')
                ->useCurrent();


            $table->foreign('id_reserva')
                ->references('id_reserva')
                ->on('RESERVA')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencia');
    }
};
