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
        Schema::create('mascota', function (Blueprint $table) {
            $table->id('id_mascota');

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('nombre', 50);
            $table->enum('especie', ['Perro', 'Gato', 'Otro']);
            $table->string('raza', 50)->nullable();
            $table->enum('tamano', ['Pequeño', 'Mediano', 'Grande', 'Gigante'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascota');
    }
};
