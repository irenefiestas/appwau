<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cuidador;

class CuidadorSeeder extends Seeder
{
    public function run(): void
    {
        Cuidador::updateOrInsert(
    ['user_id' => 3],
    [
        'biografia' => 'Amante de los perros',
        'ranking_promedio' => 4.5,
        'ciudad' => 'Jaén',
        'precio_hora' => 5,
        'paseo' => 0,
        'guarderia' => 0,
        'cuidado_domicilio' => 1
    ]
);

Cuidador::updateOrInsert(
    ['user_id' => 5],
    [
        'biografia' => 'Cuidador con experiencia',
        'ranking_promedio' => 4.8,
        'ciudad' => 'Granada',
        'precio_hora' => 6,
        'paseo' => 1,
        'guarderia' => 0,
        'cuidado_domicilio' => 0
    ]
);
    }
}
