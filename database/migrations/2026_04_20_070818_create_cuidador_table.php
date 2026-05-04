<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cuidador', function (Blueprint $table) {
            $table->id('id_cuidador');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('biografia')->nullable();
            $table->string('ciudad');
            $table->decimal('precio_hora', 6, 2);
            $table->boolean('paseo')->default(false);
            $table->boolean('guarderia')->default(false);
            $table->boolean('cuidado_domicilio')->default(false);
            $table->boolean('verificado')->default(false);
            $table->decimal('ranking_promedio', 3, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cuidador');
    }
};