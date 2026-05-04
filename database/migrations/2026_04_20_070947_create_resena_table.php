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

        Schema::create('resena', function (Blueprint $table) {
        $table->id('id_resena');

        $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');
        $table->integer('puntuacion');
        $table->text('comentario')->nullable();

        $table->timestamp('fecha_publicacion')
            ->useCurrent();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resena');
    }
};
