<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resena;

class ResenaSeeder extends Seeder
{
    public function run(): void
    {
        Resena::insert([
            [
                'user_id' => 2,
                'puntuacion' => 5,
                'comentario' => 'Excelente servicio'
            ]
        ]);
    }
}
