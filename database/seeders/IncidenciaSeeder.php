<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Incidencia;

class IncidenciaSeeder extends Seeder
{
    public function run(): void
    {
        Incidencia::insert([
            [
                'id_reserva' => 1,
                'tipo_excepcion' => 'Otro',
                'descripcion' => 'Sin problemas',
                'estado_resolucion' => 'Cerrada'
            ]
        ]);
    }
}