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

        Schema::create('servicio', function (Blueprint $table) {
            $table->id('id_servicio');

            $table->unsignedBigInteger('id_cuidador');

            $table->string('tipo_servicio');
            $table->decimal('precio_base', 10, 2);

            
            $table->foreign('id_cuidador')
                ->references('id_cuidador')
                ->on('cuidador')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio');
    }
};
